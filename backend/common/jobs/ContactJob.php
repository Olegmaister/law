<?php

namespace common\jobs;

use api\models\SupportMessage;
use Yii;

class ContactJob extends \yii\base\BaseObject implements \yii\queue\JobInterface
{
    public ?SupportMessage $model = null;

    public function execute($queue)
    {
        return $this->sendNotifyEmail() && $this->sendEmail();
    }

    protected function sendEmail()
    {
        return Yii::$app->mailer->compose(['html' => 'support-question-html'], ['message' => $this->model])
            ->setFrom([Yii::$app->params['infoEmail'] => Yii::$app->name])
            ->setTo($this->model->email)
            ->setSubject(Yii::t('app', 'FDCPA Help Submission') . '#' . $this->model->id)
            ->send();
    }

    protected function sendNotifyEmail()
    {
        return Yii::$app->mailer->compose(['html' => 'support-question-notify-html'], ['message' => $this->model])
            ->setFrom([$this->model->email => $this->model->name])
            ->setTo(Yii::$app->params['infoEmail'])
            ->setSubject(Yii::t('app', 'Contact technical support') . '#' . $this->model->id)
            ->send();
    }
}