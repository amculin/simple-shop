<?php
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'Simple Shop',

    // the basePath of the application will be the `docnet-micro` directory
    'basePath' => __DIR__ . '/../',

    // this is where the application will find all controllers
    'controllerNamespace' => 'app\controllers',

    // set an alias to enable autoloading of classes from the 'app' namespace
    'aliases' => [
        '@app' => __DIR__ . '/../',
    ],

    'components' => [
        'db' => $db['db_simple_shop'],
        'request' => [
            'cookieValidationKey' => 'oieUwe0w@e92msd8Wr92jdYD8%m6csUB30dsp7SJDK!fdv$dfk02JfoE#mdPw3mUjc2&Vpd$sa7WK2',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'url' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                $urlPrefix . '/view/<id>' => 'document-form/view',
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'user' => [
            'class'=>'yii\web\User',
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['/login'],
        ],
    ],
];

if (YII_ENV_DEV) {
    $config['aliases'] = ['@bower' => '@vendor/bower-asset'];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;