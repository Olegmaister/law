<?php

namespace common\models;

use yii\web\UploadedFile;

/**
 * This is the model class for table "review".
 */
class Review extends base\BaseReview
{
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 10;

    /** @var UploadedFile | string */
    public $image;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'], // TODO skipOnEmpty
        ]);
    }
}