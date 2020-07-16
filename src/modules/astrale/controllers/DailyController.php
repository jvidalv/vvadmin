<?php

namespace app\modules\astrale\controllers;

use app\models\astrale\Daily;
use yii\data\ActiveDataProvider;

/**
 * Class DailyController
 * @package app\modules\astrale\controllers
 */
class DailyController extends AstraleController
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
