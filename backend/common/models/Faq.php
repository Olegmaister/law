<?php

namespace common\models;

/**
 * This is the model class for table "faq".
 */
class Faq extends base\BaseFaq
{
    const TYPE_DEFAULT = null;
    const TYPE_PRACTICE_AREA = 'practice-area';

    public $type = null;

    public static function order()
    {
        return ['priority' => SORT_ASC];
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'title' => 'Question',
            'text' => 'Answer',
        ]);
    }
}
