<?php

namespace app\modules\app\controllers;

use app\models\app\User;
use yii\data\ActiveDataProvider;

/**
 * Class DailyController
 * @package app\modules\astrale\controllers
 */
class UsersController extends AppController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $query = User::find();

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
