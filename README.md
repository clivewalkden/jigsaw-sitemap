# Jigsaw Sitemap

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
],
```

## Laravel 6 Updates (Jigsaw 1.3.16+)
Updates to make the plugin work with Laravel 6 components used in Jigsaw 1.3.16+ were made by Clive Walkden. All previous work was done by [Ryan Scherler](https://github.com/eastslopestudio/jigsaw-sitemap).

## Changelog
To see the changelog open [CHANGELOG.md](./CHANGELOG.md)