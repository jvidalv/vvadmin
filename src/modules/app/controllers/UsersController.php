<?php

namespace app\modules\app\controllers;

use app\controllers\VController;
use app\models\app\User;
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
