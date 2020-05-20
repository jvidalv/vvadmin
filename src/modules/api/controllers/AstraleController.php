<?php

namespace app\modules\api\controllers;

use app\models\astrale\Compatibility;
use app\models\astrale\Daily;

/**
 * Class ApiController
 * @package app\modules\api\controllers
 */
class AstraleController extends ApiController
{
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
}
