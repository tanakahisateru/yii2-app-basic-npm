# How to use NPM with Yii 2

This is an example how to use NPM with Yii 2.

```bash
composer create-project --stability=dev tanakahisateru/yii2-app-basic-npm
```

You can install Gulp or such as seamlessly via NPM now!

## Modification points

### composer.json

`provide` section added to skip them while Composer process.
fxp-composer-asset-plugin is expected to be uninstalled.

```json
{
    "provide": {
        "bower-asset/jquery": "*",
        "bower-asset/jquery.inputmask": "*",
        "bower-asset/bootstrap": "*",
        "bower-asset/punycode": "*",
        "bower-asset/typeahead.js": "*",
        "bower-asset/yii2-pjax": "*"
    },
    "scripts": {
        "post-install-cmd": [
            "yii\\composer\\Installer::postInstall",
            "npm install"
        ],
        "post-create-project-cmd": [
            "yii\\composer\\Installer::postCreateProject",
            "yii\\composer\\Installer::postInstall",
            "npm install"
        ]
    }
}
```

### package.json

NPM alternatives.

```json
{
  "dependencies": {
    "bootstrap": "^3.3.7",
    "jquery": "^2.2.4",
    "jquery.inputmask": "^3.3.4",
    "punycode": "^2.1.0",
    "typeahead.js": "^0.11.1",
    "yii2-pjax": "^2.0.6"
  },
  "devDependencies": {},
  "private": true
}
```

### config/web.php

```php
<?php
$config = [
    // standard paths for Bower and NPM
    'aliases' => [
        '@bower' => '@app/components',
        '@npm'   => '@app/node_modules',
    ],
    'components' => [    
        // assetManager settings added
        'assetManager' => [
            'bundles' => array_merge(
                require(__DIR__ . '/assets-default.php'),
                require(__DIR__ . '/assets-extended.php')
            ),
        ],
    ],
];
```

### config/assets-default.php

AssetManager's `bundles` setting can modify AssetBundle's default properties. 

```php
<?php
return [
    'yii\web\JqueryAsset' => [
        'sourcePath' => '@npm/jquery/dist',
        'js' => [
            'jquery.js',
        ],
    ],
    'yii\bootstrap\BootstrapAsset' => [
        'sourcePath' => '@npm/bootstrap/dist',
        'css' => [
            'css/bootstrap.css',
        ],
    ],
    'yii\bootstrap\BootstrapPluginAsset' => [
        'sourcePath' => '@npm/bootstrap/dist',
        'js' => [
            'js/bootstrap.js',
        ],
    ],
    'yii\bootstrap\BootstrapThemeAsset' => [
        'sourcePath' => '@npm/bootstrap/dist',
        'css' => [
            'css/bootstrap-theme.css',
        ],
    ],
    'yii\widgets\MaskedInputAsset' => [
        'sourcePath' => '@npm/jquery.inputmask/dist',
        'js' => [
            'jquery.inputmask.bundle.js',
        ],
    ],
    'yii\validators\PunycodeAsset' => [
        'sourcePath' => '@npm/punycode/dist',
        'js' => [
            'punycode.js',
        ],
    ],
    'yii\gii\TypeAheadAsset' => [
        'sourcePath' => '@npm/typeahead.js/dist',
        'js' => [
            'typeahead.bundle.js',
        ],
    ],
    'yii\widgets\PjaxAsset' => [
        'sourcePath' => '@npm/yii2-pjax',
        'js' => [
            'jquery.pjax.js',
        ],
    ],
];
```

(simple form:)

```php
<?php
return [
    'yii\web\JqueryAsset'                => ['sourcePath' => '@npm/jquery/dist'],
    'yii\bootstrap\BootstrapAsset'       => ['sourcePath' => '@npm/bootstrap/dist'],
    'yii\bootstrap\BootstrapPluginAsset' => ['sourcePath' => '@npm/bootstrap/dist'],
    'yii\bootstrap\BootstrapThemeAsset'  => ['sourcePath' => '@npm/bootstrap/dist'],
    'yii\widgets\MaskedInputAsset'       => ['sourcePath' => '@npm/jquery.inputmask/dist'],
    'yii\validators\PunycodeAsset'       => ['sourcePath' => '@npm/punycode/dist'],
    'yii\gii\TypeAheadAsset'             => ['sourcePath' => '@npm/typeahead.js/dist'],
    'yii\widgets\PjaxAsset'              => ['sourcePath' => '@npm/yii2-pjax'],
];
```

## Known Issue

Gii and Debug modules are replaced to `app\modules\*` classes because they reset configured AssetManager.

## HINT

To use your compiled assets instead of source files, you can create link-skipped version of `asset-*.php`.

```php
<?php
return [
    'foo\bar\BarAsset' => [
        'sourcePath' => '@app/assets/dist/bar',  // built resources
        'js' => [],   // No JS
        'css' => [],  // No CSS
    ],
];
```
