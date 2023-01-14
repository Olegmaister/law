<?php

/* @var $this yii\web\View */
/* @var $model common\models\Practice */
/* @var $form \yii2custom\admin\core\ActiveForm */
?>

<div class="practice-form">
    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'text')->textarea() ?>
    <?= $form->field($model, 'image')->image() ?>
    <?= $form->field($model, 'status')->enum() ?>
</div>
