<?php

namespace common\models\base;

use common\models\I18nMessage;
use common\models\I18nModelMessage;
use common\models\I18nSourceMessage;
use common\models\Manager;
use Yii;

/**
 * This is the model class for table "i18n_language".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property bool $rtl
 * @property int $priority
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Manager $createdBy
 * @property Manager $updatedBy
 * @property I18nMessage[] $i18nMessages
 * @property I18nSourceMessage[] $ids
 * @property I18nModelMessage[] $i18nModelMessages0
 */
abstract class BaseI18nLanguage extends \yii2custom\common\core\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'i18n_language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'title'], 'required'],
            [['rtl'], 'boolean'],
            [['priority', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['priority', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['slug'], 'string', 'max' => 2],
            [['title'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['title'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Manager::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Manager::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
            'rtl' => Yii::t('app', 'Rtl'),
            'priority' => Yii::t('app', 'Priority'),
            'created_by' => Yii::t('app', 'Created by'),
            'updated_by' => Yii::t('app', 'Updated by'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Manager::class, ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Manager::class, ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getI18nMessages()
    {
        return $this->hasMany(I18nMessage::class, ['language' => 'slug']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(I18nSourceMessage::class, ['id' => 'id'])->viaTable('i18n_message', ['language' => 'slug']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getI18nModelMessages0()
    {
        return $this->hasMany(I18nModelMessage::class, ['language' => 'slug']);
    }
}
