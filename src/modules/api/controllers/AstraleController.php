<?php

namespace app\modules\api\controllers;

use app\models\astrale\Compatibility;
use app\models\astrale\Daily;
use app\models\astrale\Message;
use app\models\astrale\User;
use Exception;
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
        $behaviors = parent::behaviors();
        $behaviors['verbs'] = [
            'class' => VerbFilter::class,
            'actions' => [
                'daily' => ['GET'],
                'compatibility' => ['GET'],
                'message' => ['POST'],
                'user' => ['POST'],
            ],
        ];

        return $behaviors;
    }

    /**
     * @param string $day
     * @param string $sign
     * @return Daily
     */
    public function actionDaily(string $day, string $sign): Daily
    {
        return Daily::findOne(['sign' => $sign, 'day' => $day]) ?? Daily::findOne(['sign' => $sign]);
    }

    /**
     * @param string $sign1
     * @param string $sign2
     * @return Compatibility|null
     */
    public function actionCompatibility(string $sign1, string $sign2): ?Compatibility
    {
        return Compatibility::findOne(['sign1' => $sign1, 'sign2' => $sign2]) ?? null;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function actionMessage(): bool
    {
        $params = json_decode(Yii::$app->request->getRawBody());
        $email = $params->email;
        $message = $params->message;
        $astrologer = $params->astrologer;

        $m = new Message();
        $m->message = $message;
        $m->email = $email;
        $m->astrologer = $astrologer;
        $m->answered = 0;

        return $m->insert();
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function actionUser(): bool
    {
        $user = null;
        $params = json_decode(Yii::$app->request->getRawBody(), true);
        if (isset($params['expo_token'])) {
            $user = User::findOne(['expo_token' => $params['expo_token']]);
        }
        if ($user) {
            $user->setAttributes($params, false);
            return $user->save();
        } else {
            $user = new User();
            $user->setAttributes($params, false);
            $user->created_at = Date('Y-m-d H:i:s');
            return $user->insert();
        }
    }
}
