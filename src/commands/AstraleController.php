<?php

namespace app\commands;

use app\models\astrale\User;
use ExponentPhpSDK\Exceptions\ExpoException;
use ExponentPhpSDK\Exceptions\UnexpectedResponseException;
use ExponentPhpSDK\Expo;
use yii\console\Controller;

/**
 * Class AstraleController
 * @package app\commands
 */
class AstraleController extends Controller
{
    /**
     * Token used for testing
     */
    const TEST_TOKEN = 'ExponentPushToken[uSJuVRP8fLsO6ZtLo7d21r]';

    /**
     * Messages send to users
     */
    const MESSAGES = [
        'es' => [
            "Has leído ya lo que te deparan las estrellas hoy?",
            "No te pierdas las predicciones de nuestros astrólogos para hoy!",
            "Hay dias que una buena predicción puede alegrarte el ánimo!",
            "Es el futuro o el presente, entra para descubrirlo!",
            "Las predicciones de hoy son de Samanta, suelen ser siempre positivas, compruebalas!",
        ],
        'en' => [
            "Have you read what the stars have in store for you today?",
            "Don't miss our astrologers' predictions for today!",
            "There are days when a good prediction can cheer you up!",
            "It's the future or the present, come in and find out!",
            "Today's predictions are Samantha's, they are always positive, check them out!"
        ]
    ];

    /**
     * Daily notifications for Astrale mobile application users
     * @return void
     * @throws ExpoException
     * @throws UnexpectedResponseException
     */
    public function actionDailyNotifications(): void
    {
        $users = User::find()->all();
        $expo = Expo::normalSetup();

        foreach ($users as $user) {
            /** @var $user User */
            $expo->subscribe($user->expo_token, $user->expo_token);
            $notification = ['body' => self::MESSAGES[$user->language][rand(0, 4)]];
            $expo->notify([$user->expo_token], $notification);
        }
    }
}
