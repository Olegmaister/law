<?php

namespace common\models;

use yii\web\UploadedFile;

/**
 * This is the model class for table "example".
 */
class Example extends base\BaseExample
{
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 10;

    /** @var UploadedFile|string */
    public $image;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['status'], 'default', 'value' => self::STATUS_PUBLISHED],
            [['status'], 'in', 'range' => array_keys(self::enum('status'))],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'svg'], // TODO skipOnEmpty
        ]);
    }
}
