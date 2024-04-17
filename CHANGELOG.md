# 4.0.2 - 2024-04-17

### Fixed

- Fixed craftcms/cms dependency version with update to lock file.

# 4.0.1 - 2024-04-17

### Fixed

- Fixed craftcms/cms dependency version to ^5.0

# 4.0.0 - 2024-04-04

### Updated

- Compatibility update with Craft version 5.1.

## 3.0.6 - 2023-08-25

### Fixed

-   Update Composer dependencies to resolve Dependabot alerts #13, #14 and #15

## 3.0.5 - 2023-08-25

### Fixed

-   This release aims to resolve a previous mistake of neglecting to bump the package version in composer.json, making this release unavailable by packagist.

## 3.0.4 - 2023-03-30

### Fixed

-   Use \Twig\Compiler class in CriticalCssNode class, replacing old `\Twig_compiler` class.

## 2.5.0 - 2023-03-30

### Fixed

-   Update svg-sanitize to 0.16.0 to satisfy the requirements in version 3.8.5 of Craft cms

## 3.0.2 - 2022-06-10

### Fixed

-   Upgrade guzzlehttp/guzzle to 7.4.4

## 3.0.1 - 2022-06-07

### Fixed

-   Update `composer.lock`

**Craft 4.0.2 is now a minimal requirement.**

## 3.0.0 - 2022-05-18

### Added

-   Craft 4 compatibility

**Craft 4.0.2 is now a minimal requirement.**

## 2.4.0 - 2021-02-25

### Fixed

-   Upgrade svg-sanitize to fix Craft CMS 3.7.33 compatibility.

**Craft 3.7.33 is now a minimal requirement.**

## 2.3.0 - 2021-04-30

### Fixed

-   Require minimum of Craft CMS 3.6.12.1 to address `composer/composer` [vulnerability](https://github.com/composer/composer/security/advisories/GHSA-h5h8-pc6h-jvvx).

**Craft 3.6.12.1 is now a minimal requirement.**

## 2.2.0 - 2021-01-28

### Fixed

-   Upgrade svg-sanitize to fix Craft CMS 3.6 compatibility.

**Craft 3.6.0 is now a minimal requirement.**

## 2.1.0 - 2020-09-23

### Fixed

-   Require a minimum of Craft CMS 3.5.10 to ensure Yii version is 2.0.38 and above. Resolves [vulnerability](https://github.com/advisories/GHSA-699q-wcff-g9mj).

## 2.0.1 - 2020-02-26

### Fixed

-   Updated composer.lock to replicate changes made in composer.json for v2.0.0.

## 2.0.0 - 2020-02-24

### Fixed

-   Updated packages to resolve [vulnerability](https://github.com/advisories/GHSA-gf8j-v8x5-h9qp) in `enshrined/svg-sanitize`.

**Craft 3.4.0 is now a minimal requirement.**

## 1.2.1 - 2020-01-23

### Fixed

-   Missing `$content` variable fixed

## 1.2.0 - 2020-01-20

### Added

-   Critical CSS can now be printed anywhere via `{{ craft.styleinliner.printcriticalcss('fullwidth') | raw }}`

## 1.1.2 - 2018-11-12

### Added

-   Critical CSS can be switched on/off for each environment using the plugin configuration file

### Fixed

-   Fixed an issue that could occur when switching template modes during a request.

## 1.1.1.1 - 2018-07-16

### Fixed

-   Fixed a bug where unwanted slashes could be added to the critical CSS file paths.

## 1.1.0 - 2018-07-16

### Added

-   Adds a `{% criticalcss 'path' %}` twig tag for inlining entire local CSS files in the document head.

## 1.0.0 - 2018-07-19

### Added

-   Adds an `{% inlinecss %}` Twig tag that inlines any CSS rules in the HTML.
