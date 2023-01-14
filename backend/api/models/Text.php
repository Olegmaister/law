<?php

namespace api\models;

use yii2custom\api\traits\TActiveRecord;

class Text extends \common\models\Text
{
    use TActiveRecord;

    public function fields()
    {
        return ['page', 'slug', 'value'];
    }
}