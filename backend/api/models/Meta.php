<?php

namespace api\models;

use yii2custom\api\traits\TActiveRecord;

class Meta extends \common\models\Meta
{
    use TActiveRecord;

    public function fields()
    {
        return ['title', 'description', 'custom', 'url'];
    }
}