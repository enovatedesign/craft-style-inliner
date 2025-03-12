# Craft 5 Style Inliner Plugin

> A Twig tag for inlining styles in a template.

## Requirements

This plugin requires Craft CMS 5.2 or later.

## Installation

To install this plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

```sh
cd /path/to/project
```

2. Tell Composer to require the plugin:

```sh
composer require enovatedesign/craft-style-inliner
```

3. Install the plugin via ./craft install/plugin enovatedesign/craft-style-inliner via the CLI, or in the Control Panel, go to Settings → Plugins and click the “Install” button for Style Inliner.

## Usage

### Inline CSS

Use the `{% inlinecss %}{% endinlinecss %}` tag pair in your templates.

Input:

```twig
{% inlinecss %}
<html>
    <head>
        <style type="text/css">
            h1 { color: red }
        </style>
    </head>
    <body>
        <h1>Hello, world!</h1>
    </body>
</html>
{% endinlinecss %}
```

Output:

```twig
<html>
    <head>
        <style type="text/css">
            h1 { color:red }
        </style>
    </head>
    <body>
        <h1 style="color: red;">Hello, world!</h1>
    </body>
</html>
```

### Critical CSS

You can inline entire local CSS files in to the `<head>` of a document
with the `{% criticalcss %}` twig tag.

```twig
{% extends "_layout.twig" %}

{% criticalcss 'home' %}
```

The `.css` extension is added automatically. By default the plugin
prefixes the `@webroot/` alias, but this can be configured in a config file.
You can also switch critical CSS on and off entirely for each environment:

`/config/style-inliner.php`
```php
<?php

return [
    'criticalCss' => true,
    'criticalPrefix' => '@webroot/resources/',
];
```

For added flexibility the Critical CSS can be printed anywhere via:

```twig
{{ craft.styleinliner.printcriticalcss('fullwidth') | raw }}
```