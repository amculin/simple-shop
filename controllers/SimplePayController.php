<?php

namespace app\controllers;

use app\models\Users;
use yii\filters\auth\QueryParamAuth;
use yii\filters\AccessControl;
use yii\rest\ActiveController;
use Yii;

class SimplePayController extends ActiveController
{
    public $modelClass = 'app\models\SimplePay';

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
                    'actions' => ['index'],
                    'matchCallback' => function ($rule, $action) {
                        if (Yii::$app->user->identity->user_type == Users::USER_TYPE_ADMIN) {
                            return true;
                        }
                    }
                ],
                [
                    'allow' => true,
                    'roles' => ['@'],
                    'actions' => ['view', 'create', 'update'],
                    'matchCallback' => function ($rule, $action) {
                        if (Yii::$app->user->identity->user_type == Users::USER_TYPE_MEMBER) {
                            return true;
                        }
                    }
                ],
            ],
        ];

        return $behaviors;
    }
}