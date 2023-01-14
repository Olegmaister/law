<?php

namespace api\models;

use yii2custom\api\traits\TActiveRecord;

class Faq extends \common\models\Faq
{
    use TActiveRecord;

    public function fields()
    {
        return ['title', 'text'];
    }
}