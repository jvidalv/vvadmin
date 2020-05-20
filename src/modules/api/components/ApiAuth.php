<?php

namespace app\modules\api\components;

use app\utils\Env;
use yii\filters\auth\AuthMethod;

/**
 * Class ApiAuth
 * @package app\modules\api\components
 */
class ApiAuth extends AuthMethod
{
    /**
     * Valid auth for PRO env
     */
    const VALID_AUTH = "josep-is-the-best-programmer-out-there";

    /**
     * {@inheritdoc}
     */
    public function authenticate($user, $request, $response)
    {
        return !Env::isPro() || $request->getHeaders()->get('authorization') === self::VALID_AUTH;
    }
}
