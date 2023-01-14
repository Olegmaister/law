<?php

namespace common\models\base;

use common\models\I18nLanguage;
use Yii;

/**
 * This is the model class for table "i18n_model_message".
 *
 * @property int $id
 * @property string $language
 * @property string $model_name
 * @property int $model_id
 * @property string $attribute
 * @property string $translation
 *
 * @property I18nLanguage $language0
 */
abstract class BaseI18nModelMessage extends \yii2custom\common\core\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'i18n_model_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['language', 'model_name', 'model_id', 'attribute', 'translation'], 'required'],
            [['model_id'], 'default', 'value' => null],
            [['model_id'], 'integer'],
            [['translation'], 'string'],
            [['language'], 'string', 'max' => 2],
            [['model_name', 'attribute'], 'string', 'max' => 255],
            [['language', 'model_name', 'model_id', 'attribute'], 'unique', 'targetAttribute' => ['language', 'model_name', 'model_id', 'attribute']],
            [['language'], 'exist', 'skipOnError' => true, 'targetClass' => I18nLanguage::class, 'targetAttribute' => ['language' => 'slug']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'language' => Yii::t('app', 'Language'),
            'model_name' => Yii::t('app', 'Model name'),
            'model_id' => Yii::t('app', 'Model'),
            'attribute' => Yii::t('app', 'Attribute'),
            'translation' => Yii::t('app', 'Translation'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage0()
    {
        return $this->hasOne(I18nLanguage::class, ['slug' => 'language']);
    }
}
