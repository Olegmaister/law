<?php

namespace api\models;

use yii2custom\api\traits\TActiveRecord;

class Example extends \common\models\Example
{
    use TActiveRecord;

    public function fields()
    {
        return ['title', 'image'];
    }

    public static function find()
    {
        return parent::find()->andWhere([
            'status' => self::STATUS_PUBLISHED,
        ]);
    }
}