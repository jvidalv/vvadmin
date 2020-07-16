<?php

namespace app\modules\astrale\controllers;

use app\models\astrale\User;
use yii\data\ActiveDataProvider;

/**
 * Class DailyController
 * @package app\modules\astrale\controllers
 */
class UsersController extends AstraleController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $query = User::find()->orderBy(['created_at' => SORT_DESC]);

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
