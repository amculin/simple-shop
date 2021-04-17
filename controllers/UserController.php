<?php

namespace app\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\Users';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];

        return $behaviors;
    }
}