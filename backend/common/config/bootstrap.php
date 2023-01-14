<?php

use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;

Yii::setAlias('@root', dirname(dirname(__DIR__)));
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@admin', dirname(dirname(__DIR__)) . '/admin');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@api', dirname(dirname(__DIR__)) . '/api');
Yii::setAlias('@media', dirname(dirname(__DIR__)) . '/api/web/media');
Yii::setAlias('@frontend', dirname(dirname(dirname(__DIR__))) . '/frontend');
Yii::setAlias('@media-web', '/media');

$params = ArrayHelper::merge(require_once __DIR__ . '/params.php', require_once __DIR__ . '/params-local.php');
Yii::setAlias('@domain', $params['domain']);
Yii::setAlias('@host', '//' . Yii::getAlias('@domain'));

if (!empty($_SERVER['HTTP_HOST'])) {
    Yii::setAlias('@origin', StringHelper::endsWith($_SERVER['HTTP_HOST'], '.loc') ? '*' : 'https://' . Yii::getAlias('@domain'));
}
