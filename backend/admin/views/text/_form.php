<?php

/* @var $this yii\web\View */
/* @var $model common\models\Text */
/* @var $form \yii2custom\admin\core\ActiveForm */
?>

<div class="text-form">
    <?= $form->field($model, 'page')->enum() ?>
    <?= $form->field($model, 'slug')->textInput() ?>
    <?= $form->field($model, 'value')->textarea() ?>
</div>
