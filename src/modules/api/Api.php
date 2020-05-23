<?php

namespace app\modules\api;

use yii\base\Module;

/**
 * Class Api
 * @package app\modules\api
 */
class Api extends Module
{
    /**
     * @var string
     */
    public $controllerNamespace = 'app\modules\api\controllers';
    /**
     * @var string
     */
    public $defaultRoute = 'api';
}
