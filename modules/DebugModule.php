<?php

namespace app\modules;

use Yii;
use yii\debug\Module;

class DebugModule extends Module
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
