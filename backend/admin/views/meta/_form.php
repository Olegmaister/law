<?php

/* @var $this yii\web\View */
/* @var $model common\models\Meta */
/* @var $form \yii2custom\admin\core\ActiveForm */
?>

<div class="meta-form">
    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'description')->textInput() ?>
    <? /* $form->field($model, 'custom')->textarea() */ ?>
    <? if (Yii::$app->controller->id == 'meta'): ?>
        <?= $form->field($model, 'url')->textInput() ?>
    <? endif ?>
</div>
