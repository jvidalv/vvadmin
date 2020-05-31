<?php

namespace app\modules\app;

/**
 * app module definition class
 */
class App extends \yii\base\Module
{
    public $defaultRoute = 'App';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\app\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
