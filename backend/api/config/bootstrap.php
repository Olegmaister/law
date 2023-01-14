<?php

header("Access-Control-Allow-Origin: " . Yii::getAlias('@origin'));
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, User-Agent");
header("Access-Control-Allow-Methods: PUT, PATCH, POST, GET, OPTIONS, DELETE");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

Yii::setAlias('@media-web', '/media');
Yii::setAlias('@upload', '@api/runtime/upload');
Yii::setAlias('@api-host', str_replace(Yii::getAlias('@domain'), 'api.' . Yii::getAlias('@domain'), Yii::getAlias('@host')));
