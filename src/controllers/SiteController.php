<?php

namespace app\controllers;

use app\models\app\Contact;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends VController
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->renderPartial('login', [
            'model' => $model,
        ]);
    }

    /**
     * Contact action.
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new Contact();
        if (!$model->hash && $model->load(Yii::$app->request->post()) && $model->save()) {
            $model->hash = hash('md5', $model->id);
            $model->save();
        }

        return $this->renderPartial('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Privacy policy
     * @return string
     */
    public function actionPrivacyPolicy(){
        return $this->renderPartial(
            'privacy-policy'
        );
    }

    /**
     * Astrale show page
     * @return string
     */
    public function actionAstrale(){
        return $this->renderPartial(
            'astrale'
        );
    }

    /**
     * Logout action.
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
