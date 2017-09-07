<?php

require(__DIR__ . '/../vendor/autoload.php');

if (!getenv('YII_ENV')) {
    (new josegonzalez\Dotenv\Loader([
        __DIR__ . '/../.env',
        __DIR__ . '/../.env.default'
    ]))->parse()->toEnv()->putenv();
}
defined('YII_DEBUG') or define('YII_DEBUG', getenv('YII_DEBUG'));
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV'));

require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
