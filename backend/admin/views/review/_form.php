<?php

/* @var $this yii\web\View */
/* @var $model common\models\Review */
/* @var $form \yii2custom\admin\core\ActiveForm */
?>

<div class="review-form">
    <?= $form->field($model, 'image')->image() ?>
    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'text')->textarea() ?>
    <?= $form->field($model, 'status')->enum() ?>
</div>
