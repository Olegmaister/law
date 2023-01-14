<?php

namespace api\models;

use yii2custom\api\traits\TActiveRecord;

class Review extends \common\models\Review
{
    use TActiveRecord;

    public function fields()
    {
        return ['name', 'text', 'image'];
    }

    public static function find()
    {
        return parent::find()->andWhere([
            'status' => self::STATUS_PUBLISHED
        ]);
    }
}