<?php

$console = empty($_SERVER['HTTP_HOST']);
$localhost = $console || (substr($_SERVER['HTTP_HOST'], -4) == '.loc');

$config = [
    'name' => 'FDCPA Attorney',
    'language' => 'en',
    'bootstrap' => ['queue', 'log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=localhost;dbname=law',
            'username' => 'law',
            'password' => '',
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 600,
            'schemaCache' => 'cache',
            'schemaMap' => [
                'pgsql' => [
                    'class' => 'yii\db\pgsql\Schema',
                    'defaultSchema' => 'public',
                ]
            ],
        ],
        'cache' => [
            'class' => YII_ENV_DEV ? 'yii\caching\DummyCache' : 'yii\redis\Cache',
        ],
        'i18n' => [
            'class' => '\yii2custom\common\core\I18N',
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceLanguage' => 'en',
                    'sourceMessageTable' => 'i18n_source_message',
                    'messageTable' => 'i18n_message',
                ],
                'web' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceLanguage' => 'en',
                    'sourceMessageTable' => 'i18n_source_message',
                    'messageTable' => 'i18n_message',
                ]
            ],
        ],
        'formatter' => [
            'class' => '\yii2custom\common\core\Formatter',
            'nullDisplay' => '',
            'dateFormat' => 'php:y/m/d',
            'datetimeFormat' => 'php:y/m/d H:i',
            'timeFormat' => 'php:H:i:s',
        ],
        'redis' => [
            'class' => '\yii\redis\Connection',
            'retries' => 1,
        ],
        'queue' => [
            'class' => '\yii\queue\file\Queue',
            'path' => '@console/runtime/queue',
            'as log' => '\yii\queue\LogBehavior',
        ],
        'languages' => [
            'class' => '\yii2custom\common\components\Languages',
        ],
        'authManager' => [
            'class' => 'yii2custom\common\core\AuthManager',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mailgun.org',
                'username' => 'postmaster@mg.stopcollections.net',
                'password' => '65a48808bd13bb6d6ef0e9fd8dc8a80b-71b35d7e-cf7262d4',
                'streamOptions' => ['ssl' => ['allow_self_signed' => true, 'verify_peer' => false, 'verify_peer_name' => false]],
                'encryption' => 'tls',
                'port' => '587',
            ],
        ]
    ],
];

if ((YII_ENV_DEV && $console) || $localhost) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1'],
    ];
}

if (YII_DEBUG) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1'],
        'generators' => [
            'crud' => [
                'class' => '\yii2custom\common\core\generators\crud\Generator',
                'templates' => ['default' => '@vendor/diembzz/yii2custom/src/common/core/generators/crud/views'],
            ],
            'model' => [
                'class' => '\yii2custom\common\core\generators\model\Generator',
                'templates' => ['default' => '@vendor/diembzz/yii2custom/src/common/core/generators/model/views'],
            ]
        ],
    ];
}

return $config;