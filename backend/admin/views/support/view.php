<?php

use admin\models\SupportMessage;
use admin\widgets\ActionHeaderWidget;
use yii\helpers\StringHelper;
use yii2custom\admin\core\ActiveForm;

/* @var $this yii\web\View */
/* @var $model SupportMessage */

$this->title = Yii::t('app', 'Support Message') . ': ' . StringHelper::truncate($model->id, 30);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Support Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->id;
?>

<div class="support-message-view card">

    <? $form = ActiveForm::begin(['readonly' => true]) ?>

  <div class="card-header">
      <?= ActionHeaderWidget::widget(['left' => [
          'create' => false,
          'update' => false,
          'delete' => $model->status != $model::STATUS_ARCHIVE
      ]]) ?>
  </div>

  <div class="card-body">
    <div class="support-message-form">
      <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'name')->textInput() ?></div>
        <div class="col-md-6"><?= $form->field($model, 'email')->textInput() ?></div>
      </div>

      <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'phone')->textInput() ?></div>
        <div class="col-md-6"><?= $form->field($model, 'status')->enum() ?></div>
      </div>

      <div class="form-group field-message">
        <div class="card">
          <div class="card-header">
            <label class="has-star" for="message"><?= Yii::t('app', 'Message') ?></label>
          </div>
          <div class="card-body">
            <div class="form-control-plaintext"><?= $model->message ?></div>
          </div>
        </div>
      </div>

      <div class="form-group field-answers">
        <div class="card">
          <div class="card-header">
            <label class="has-star" for="message"><?= Yii::t('app', 'Answers') ?></label>
          </div>
          <div class="card-body">
            <div class="form-control-plaintext">
                <? foreach ($model->info as $question): ?>
                  <li><?= htmlentities($question) ?></li>
                <? endforeach ?>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="card">
          <div class="card-header">
            <label class="has-star" for="message"><?= Yii::t('app', 'Info') ?></label>
          </div>
          <div class="card-body">
            <b>IP:</b> <?= $model->ip ?>
            <br>
            <b>Url:</b> <?= $model->url ?>
              <? if ($model->referrer): ?>
                <br>
                <b>Referrer:</b> <?= $model->referrer ?>
              <? endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>
    <? ActiveForm::end() ?>
</div>