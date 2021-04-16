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
        'user' => [
            'class'=>'yii\web\User',
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['/login'],
        ],
    ],
];

return $config;