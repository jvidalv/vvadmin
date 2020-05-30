<?php

namespace app\modules\api\controllers;

use app\modules\api\components\ApiAuth;
use Exception;
use yii\rest\Controller;
use yii\web\HttpException;
use yii\web\Response;

/**
 * Class ApiController
 * @package app\modules\api\controllers
 */
class ApiController extends Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class' => '\yii\filters\Cors',
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => true,
            ],
        ];
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        $behaviors['authenticator'] = [
            'class' => ApiAuth::class,
        ];
        return $behaviors;
    }

    /**
     * @return string
     */
    public function actionIndex(){
        return '👋 It works! Check my blog at https://vvlog.dev';
    }

}
