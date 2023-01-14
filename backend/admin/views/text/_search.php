<?php

use yii\helpers\Html;
use \yii2custom\admin\core\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\models\search\TextSearch */
/* @var $form \yii2custom\admin\core\ActiveForm */
?>

<div class="text-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'slug') ?>

    <?= $form->field($model, 'value') ?>

    <?= $form->field($model, 'page') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
