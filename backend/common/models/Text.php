<?php

namespace common\models;

/**
 * This is the model class for table "text".
 */
class Text extends base\BaseText
{
    const PAGE_HEADER = 'header';
    const PAGE_FIRST = 'first';
    const PAGE_SECOND = 'second';
    const PAGE_THIRD = 'third';
    const PAGE_FOURTH = 'fourth';
    const PAGE_FIFTH = 'fifth';
    const PAGE_SIXTH = 'sixth';
    const PAGE_SEVENTH = 'seventh';
    const PAGE_EIGHTH = 'eighth';
    const PAGE_FOOTER = 'footer';

    public function formName($name = null)
    {
        return 't';
    }

    public static function titleAttribute()
    {
        return 'slug';
    }

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['page'], 'in', 'range' => array_keys(static::enum('page'))]
        ]);
    }
}
