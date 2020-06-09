<?php

namespace app\modules\blog;

/**
 * blog module definition class
 */
class Blog extends \yii\base\Module
{
    /**
     * @var string
     */
    public $defaultRoute = 'blog';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\blog\controllers';
}
