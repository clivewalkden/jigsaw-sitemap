<?php

namespace CliveWalkden\JigsawSitemap;

use Illuminate\Support\Str;
use samdark\sitemap\Sitemap;
use TightenCo\Jigsaw\Jigsaw;

class SitemapListener
{
    /**
     * Jigsaw instance.
     *
     */
    protected $jigsaw;

    public function handle(Jigsaw $jigsaw)
    {
        $this->jigsaw = $jigsaw;

        $baseUrl = $jigsaw->getConfig('baseUrl');
        if (empty($baseUrl)) {
            echo("\nTo generate a sitemap.xml file, please specify a 'baseUrl' in config.php.\n\n");
            return;
        }

        $this->generateSitemap($baseUrl);
        if ($jigsaw->getConfig('sitemap.image_sitemap.generate')) {
            $this->generateImageSitemap($baseUrl);
        }
    }

    private function generateSitemap($baseUrl)
    {
        $sitemap = new Sitemap($this->jigsaw->getDestinationPath() . '/sitemap.xml');

        collect($this->jigsaw->getOutputPaths())->each(function ($path) use ($baseUrl, $sitemap) {
            // Don't index assets
            if (!$this->isAsset($path) && !$this->isExcluded($path)) {
                // Check if a file extension is present
                if ($ext = pathinfo($path, PATHINFO_EXTENSION)) {
                    $sitemap->addItem(rtrim($baseUrl, '/') . $path, time(), Sitemap::MONTHLY);
                } else {
                    $sitemap->addItem(rtrim($baseUrl, '/') . $path . ($this->jigsaw->getConfig('sitemap.url_trailing_slash') ? '/' : ''), time(), Sitemap::MONTHLY);
                }
            }
        });

        $sitemap->write();
    }

    private function generateImageSitemap($baseUrl)
    {
        $sitemap = new Sitemap($this->jigsaw->getDestinationPath() . '/' . ($this->jigsaw->getConfig('sitemap.image_sitemap.filename') ?: 'sitemap_images.xml'));
        $exts = $this->jigsaw->getConfig('sitemap.image_sitemap.extensions');
        $supported_extensions = $exts ? $exts->toArray() : [];

        collect($this->jigsaw->getOutputPaths())->each(function ($path) use ($baseUrl, $sitemap, $supported_extensions) {
            // Don't index assets
            if ($this->isAsset($path) && !$this->isExcluded($path)) {
                // Check if a file extension is present
                $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                if (in_array($ext, $supported_extensions))
                $sitemap->addItem(rtrim($baseUrl, '/') . $path, time(), Sitemap::MONTHLY);
            }
        });

        $sitemap->write();
    }

    private function isExcluded($path)
    {
        $excluded = $this->jigsaw->getConfig('sitemap.exclude');
        $invalidAssets = $excluded ? $excluded->toArray() : [];
        return Str::contains($path, $invalidAssets);
    }

    private function isAsset($path)
    {
        return Str::startsWith($path, '/assets');
    }
}
