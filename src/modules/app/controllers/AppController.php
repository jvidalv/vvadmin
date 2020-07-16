<?php

namespace app\modules\app\controllers;

use app\controllers\VController;
use app\models\app\Contact;
use yii\data\ActiveDataProvider;

/**
 * Default controller for the `app` module
 */
class AppController extends VController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionContacts()
    {
        $query = Contact::find()->orderBy(['created_at' => SORT_DESC]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('contacts');
    }
}
