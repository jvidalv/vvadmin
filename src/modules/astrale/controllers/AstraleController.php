<?php

namespace app\modules\astrale\controllers;

use app\controllers\VController;
use app\models\astrale\Compatibility;
use app\models\astrale\Daily;
use app\models\astrale\Message;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;

/**
 * Class AstraleController
 * @package app\modules\api\controllers
 */
class AstraleController extends VController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
