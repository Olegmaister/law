<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'components' => [
        'request' => [
            'class' => 'yii2custom\api\core\Request',
            'enableCookieValidation' => false,
            'parsers' => [
                '*' => 'yii\web\JsonParser',
            ],
        ],
        'response' => [
            'format' => \yii\web\Response::FORMAT_JSON,
            'formatters' => [
                \yii\web\Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                    'prettyPrint' => YII_DEBUG,
                ],
            ],
            'on beforeSend' => function (\yii\base\Event $event) {
                if (!in_array(Yii::$app->controller->action->uniqueId ?? null, ['debug/default/index'])) {
                    $response = $event->sender;
                    $isSuccessful = $response->isSuccessful;
                    $data = ['success' => $isSuccessful];
                    if ($isSuccessful) {
                        $data['data'] = $response->data;
                    } else {
                        if (is_array($response->data)) {
                            foreach ($response->data as &$item) {
                                if (is_array($item) && $item) {
                                    $item = $item[0];
                                }
                            }
                        }
                        $data['errors'] = $response->data;
                    }

                    $response->data = $data;
                    $response->statusCode = 200;
                }
            },
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii2custom\api\core\UrlRule', 'controller' => 'redirect'],
                ['class' => 'yii2custom\api\core\UrlRule', 'controller' => 'post'],
                ['class' => 'yii2custom\api\core\UrlRule', 'controller' => 'attorney'],
                '<controller>/<id:\d+>/<action>' => '<controller>/<action>',
                '<controller>/<action>/<id:\d+>' => '<controller>/<action>',
            ],
        ],
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'common\models\Manager',
            'enableAutoLogin' => false,
        ]
    ],
    'params' => $params,
];