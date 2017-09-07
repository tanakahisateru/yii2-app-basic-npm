<?php

namespace app\modules;

use Yii;
use yii\gii\Module;

class GiiModule extends Module
{
    /**
     * @var array
     */
    public $defaultAssets = [];

    /**
     * @inheritdoc
     */
    protected function resetGlobalSettings()
    {
        Yii::$app->assetManager->bundles = $this->defaultAssets;
    }
}
