<?php

namespace app\modules\app\controllers;

use app\models\app\Contact;
use app\models\astrale\Message;
use yii\data\ActiveDataProvider;

/**
 * Class MessageController
 * @package app\modules\astrale\controllers
 */
class MessagesController extends AppController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $query = Contact::find();

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
