<?php

use yii2custom\admin\core\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model admin\models\SupportMessage */
/* @var $form yii2custom\admin\core\ActiveForm */
?>

<div class="support-message-form">
    <? $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'message')->textarea(['rows' => 8]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Answer'), ['class' => 'btn btn-success']) ?>
    </div>
    <? ActiveForm::end() ?>
</div>
