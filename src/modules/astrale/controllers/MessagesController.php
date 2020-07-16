<?php

namespace app\modules\astrale\controllers;

use app\models\astrale\Message;
use yii\data\ActiveDataProvider;

/**
 * Class MessageController
 * @package app\modules\astrale\controllers
 */
class MessagesController extends AstraleController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $query = Message::find();

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

    /**
     * @param string $id
     * @return string
     * @throws \Exception
     */
    public function actionAnswered(string $id)
    {
        $query = Message::findOne($id);

        $query->answered = !$query->answered;
        $query->update();

        return $this->redirect('index');
    }
}
