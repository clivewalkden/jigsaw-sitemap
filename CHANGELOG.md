# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

Given a version number MAJOR.MINOR.PATCH, increment the:

* MAJOR version when you make incompatible API changes,
* MINOR version when you add functionality in a backwards-compatible manner, and
* PATCH version when you make backwards-compatible bug fixes.

##### Types of changes
* [Added] for new features.
* [Changed] for changes in existing functionality.
* [Deprecated] for soon-to-be removed features.
* [Removed] for now removed features.
* [Fixed] for any bug fixes.
* [Security] in case of vulnerabilities.


## [Unreleased]

## [v1.3.1] - 2022-11-09
### Fixed
- StyleCI fixes

### Changed
- Added funding option to project


## [v1.3.0] - 2022-11-04
### Added
- Image sitemap generation with extension types, and naming option

### Fixed
- Non-asset files with extensions (robots.txt) don't get the slash added when sitemap.url_trailing_slash is true


## [v1.2.0] - 2022-11-02
### Added
- Trailing slash option to stop spiders reporting 308 permanent redirects on all links

### Changed
- Configuration to allow future expansion of the module


## [v1.1.1] - 2022-10-26
### Fixed
- Added trim to baseUrl to stop double slash


## [v1.1.0] - 2021-10-24
### Changed
- Updated to work with Latest Jigsaw 1.3.x and Laravel 6


## [v1.0.1] - 2018-10-22

## [v1.0.0] - 2018-09-29
Initial Release