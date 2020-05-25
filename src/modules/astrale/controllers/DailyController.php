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
 * Class DailyController
 * @package app\modules\astrale\controllers
 */
class DailyController extends VController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $query = Daily::find()->orderBy(['day' => SORT_DESC]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'provider' => $provider,
        ]);
    }
}
