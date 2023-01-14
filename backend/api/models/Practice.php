<?php

namespace api\models;

use yii2custom\api\traits\TActiveRecord;

class Practice extends \common\models\Practice
{
    use TActiveRecord;

    public function fields()
    {
        return ['title', 'text', 'image'];
    }

    public static function find()
    {
        return parent::find()->andWhere([
            'status' => self::STATUS_PUBLISHED,
        ]);
    }
}