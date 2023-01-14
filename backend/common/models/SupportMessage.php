<?php

namespace common\models;

/**
 * This is the model class for table "support_message".
 */
class SupportMessage extends base\BaseSupportMessage
{
    const STATUS_NEW = 0;
    const STATUS_READ = 1;
    // const STATUS_ANSWER = 2;
    const STATUS_ARCHIVE = 10;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['email'], 'email'],
            [['status'], 'default', 'value' => $this::STATUS_NEW],
            [['status'], 'in', 'range' => array_keys(self::enum('status'))],
        ]);
    }
}