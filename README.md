# Jigsaw Sitemap

[![Latest version][ico-version]][link-packagist]
[![Quality Score][ico-code-quality]][link-code-quality]
[![PSR2 Conformance][ico-styleci]][link-styleci]

Sitemap and sitemap index builder for [Jigsaw](https://jigsaw.tighten.co).

---

## Usage

Add as an event [listener](https://jigsaw.tighten.co/docs/event-listeners) in `bootstrap.php`.

```php
use CliveWalkden\JigsawSitemap\SitemapListener;

/**
 * An afterBuild event is fired after the build is complete, and all output files
 * have been written to the build directory. This allows you to obtain a list of
 * the output file paths (to use, for example, when creating a sitemap.xml file),
 * programmatically create output files, or take care of any other post-processing tasks.
 *
 * @link http://jigsaw.tighten.co/docs/event-listeners/
 */
$events->afterBuild([
    SitemapListener::class,
]);
```

> Note: You can exclude files from the sitemap by adding the following to your `config.php`:

```php
'sitemap' => [
    'url_trailing_slash' => true,
    'exclude' => [
        '.htaccess',
        'favicon.ico',
        // ...
    ],
    'image_sitemap' => [
        'generate' => true,
        'filename' => 'sitemap_images.xml',
        'extensions' => [
            'gif',
            'jpg',
            'jpeg',
            'png',
            // ...
        ]
    ]
],
```

## Laravel 6 Updates (Jigsaw 1.3.16+)
Updates to make the plugin work with Laravel 6 components used in Jigsaw 1.3.16+ were made by Clive Walkden. All previous work was done by [Ryan Scherler](https://github.com/eastslopestudio/jigsaw-sitemap).

## Changelog
To see the changelog open [CHANGELOG.md](./CHANGELOG.md)

[ico-version]: https://img.shields.io/packagist/v/clivewalkden/jigsaw-sitemap.svg?style=flat-square
[ico-code-quality]: https://scrutinizer-ci.com/g/clivewalkden/jigsaw-sitemap/badges/quality-score.png?style=flat-square
[ico-styleci]: https://styleci.io/repos/420775324/shield

[link-packagist]: https://packagist.org/packages/clivewalkden/jigsaw-sitemap
[link-code-quality]: https://scrutinizer-ci.com/g/clivewalkden/jigsaw-sitemap/
[link-styleci]: https://styleci.io/repos/420775324/
