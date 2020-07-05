<?php

namespace app\modules\blog;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Module;
use yii\web\JqueryAsset;

/**
 * blog module definition class
 */
class Blog extends Module
{
    /**
     * @var string
     */
    public $defaultRoute = 'blog';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\blog\controllers';

    /**
     * @param $filename
     * @param array $options
     * @param null $key
     * @throws InvalidConfigException
     */
    public function registerCssFile($filename, $options = [], $key = null)
    {
        $file = $this->basePath . DIRECTORY_SEPARATOR . "web/css/" . $filename;
        Yii::$app->getAssetManager()->publish($file);
        $url = Yii::$app->getAssetManager()->getPublishedUrl($file);
        Yii::$app->view->registerCssFile($url, $options, $key);
    }

    /**
     * @param $filename
     * @param array $options
     * @param null $key
     * @throws InvalidConfigException
     */
    public function registerJsFile($filename, $options = [], $key = null)
    {
        $options['depends'][] = JqueryAsset::class;
        $file = $this->basePath . DIRECTORY_SEPARATOR . "web/js/" . $filename;
        Yii::$app->getAssetManager()->publish($file);
        $url = Yii::$app->getAssetManager()->getPublishedUrl($file);
        Yii::$app->view->registerJsFile($url, $options, $key);
    }
}
