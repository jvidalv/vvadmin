<?php

namespace app\modules\api\controllers;

use app\models\astrale\Compatibility;
use app\models\astrale\Daily;
use app\models\astrale\Message;
use app\models\astrale\User;
use Yii;
use yii\filters\VerbFilter;

/**
 * Class AstraleController
 * @package app\modules\api\controllers
 */
class AstraleController extends ApiController
{
    /**
     * @return array|array[]
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'daily' => ['GET'],
                    'compatibility' => ['GET'],
                    'message' => ['POST'],
                    'user' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @param string $day
     * @param string $sign
     * @return Daily|null
     */
    public function actionDaily(string $day, string $sign): ?Daily
    {
        return Daily::findOne(['sign' => $sign, 'day' => $day]);
    }

    /**
     * @param string $sign1
     * @param string $sign2
     * @return Compatibility|null
     */
    public function actionCompatibility(string $sign1, string $sign2): ?Compatibility
    {
        return Compatibility::findOne(['sign1' => $sign1, 'sign2' => $sign2]);
    }

    /**
     * @return bool|null
     * @throws \Exception
     */
    public function actionMessage(): ?bool
    {
        $email = Yii::$app->request->post('email');
        $message = Yii::$app->request->post('message');

        $m = new Message();
        $m->message = $message;
        $m->email = $email;
        $m->answered = 0;

        return $m->insert();
    }

    /**
     * @return bool|null
     * @throws \Exception
     */
    public function actionUser(): ?bool
    {
        $params = Yii::$app->request->post();

        $m = new User();
        $m->setAttributes($params);

        return $m->insert();
    }
}
