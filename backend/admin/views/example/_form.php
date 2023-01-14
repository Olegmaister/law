<?php

/* @var $this yii\web\View */
/* @var $model common\models\Example */
/* @var $form \yii2custom\admin\core\ActiveForm */
?>

<div class="example-form">
    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'image')->image(['accept' => 'image/svg+xml']) ?>
    <?= $form->field($model, 'status')->enum() ?>
</div>
