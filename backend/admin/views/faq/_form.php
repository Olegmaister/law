<?php

/* @var $this yii\web\View */
/* @var $model common\models\Faq */
/* @var $form \yii2custom\admin\core\ActiveForm */
?>

<div class="faq-form">
    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'text')->textarea() ?>
</div>
