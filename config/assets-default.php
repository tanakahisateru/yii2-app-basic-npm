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
