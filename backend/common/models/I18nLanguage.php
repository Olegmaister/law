<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "i18n_language".
 */
class I18nLanguage extends base\BaseI18nLanguage
{
    const SYSTEM = ['en'];

    /** @var UploadedFile|string */
    public $image;

    public static function order()
    {
        return ['priority' => SORT_ASC];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        if (!empty($behaviors['file'])) {
            $behaviors['file']['path'] = 'language';
        }

        unset($behaviors['slug']);
        return $behaviors;
    }

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'], // TODO skipOnEmpty
        ]);
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'slug' => Yii::t('app', 'Url'),
        ]);
    }
}
