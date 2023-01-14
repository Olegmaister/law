<?php

namespace api\models;

use common\jobs\ContactJob;
use Yii;
use yii2custom\api\traits\TActiveRecord;

/**
 * @property-read string $firstName
 * @property-read string $lastName
 */
class SupportMessage extends \common\models\SupportMessage
{
    use TActiveRecord;

    public function behaviors()
    {
        return array_diff_key(parent::behaviors(), array_flip(['blame']));
    }

    public function allowInsert(): bool
    {
        return true;
    }

    public function getFirstName()
    {
        $result = explode(' ', $this->name);
        return $result[0];
    }

    public function getLastName()
    {
        $result = explode(' ', $this->name);
        if (count($result) > 1) {
            return join(' ', array_splice($result, 1));
        }
        return '';
    }

    public function beforeValidate()
    {
        $this->ip = Yii::$app->request->userIP;
        return parent::beforeValidate();
    }

    public function afterSave($insert, $changedAttributes)
    {
        Yii::$app->queue->push(new ContactJob(['model' => $this]));
        parent::afterSave($insert, $changedAttributes);
    }
}