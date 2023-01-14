<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-admin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'admin\controllers',
    'defaultRoute' => 'support/index',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
    ],
    'container' => [
        'definitions' => [
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-admin',
        ],
        'session' => [
            'name' => 'ADMINSESSID'
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'user' => [
            'class' => '\yii2custom\admin\core\User',
            'identityClass' => 'common\models\Manager',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login'],
        ],
        'urlManager' => [
            'class' => '\yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<lang:[a-z]{2}>' => 'site/set-language',
            ],
        ],
        'i18n' => [
            'translations' => [
                'kvgrid' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@vendor/kartik-v/yii2-grid/messages',
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                '\yii\bootstrap\BootstrapAsset' => false,
            ],
        ],
    ],
    'on beforeAction' => function () {
        Yii::$app->languages->detect();
    },
    'params' => $params,
];