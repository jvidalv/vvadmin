<?php

namespace app\modules\astrale\controllers;

use app\controllers\VController;

/**
 * Class AstraleController
 * @package app\modules\api\controllers
 */
class AstraleController extends VController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
