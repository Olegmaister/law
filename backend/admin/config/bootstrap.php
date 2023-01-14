<?php

Yii::setAlias('@upload', '@admin/runtime/upload');
Yii::setAlias('@api-web', '//api.' . preg_replace('/^.+?\./', '', $_SERVER['HTTP_HOST']));
Yii::setAlias('@media-web', Yii::getAlias('@api-web') . '/media');