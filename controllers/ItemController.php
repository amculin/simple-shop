<?php

namespace app\controllers;

use app\models\Users;
use yii\filters\auth\QueryParamAuth;
use yii\filters\AccessControl;
use yii\rest\ActiveController;
use Yii;

class ItemController extends ActiveController
{
    public $modelClass = 'app\models\Item';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                    'matchCallback' => function ($rule, $action) {
                        if (Yii::$app->user->identity->user_type == Users::USER_TYPE_ADMIN) {
                            return true;
                        }
                    }
                ],
            ],
        ];

        return $behaviors;
    }
}