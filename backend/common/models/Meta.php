<?php

namespace common\models;

use yii2custom\common\validators\LocalUrlValidator;

/**
 * This is the model class for table "meta".
 */
class Meta extends base\BaseMeta
{
    public static function i18n()
    {
        return ['title', 'description'];
    }

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['url'], LocalUrlValidator::class]
        ]);
    }
}
