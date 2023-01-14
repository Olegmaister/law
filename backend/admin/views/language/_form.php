<?php

/* @var $this yii\web\View */
/* @var $model common\models\I18nLanguage */
/* @var $form \yii2custom\admin\core\ActiveForm */
?>

<div class="i18n-language-form">
    <?= $form->field($model, 'slug')->textInput() ?>
    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'rtl')->checkbox() ?>
    <?= $form->field($model, 'image')->image() ?>
</div>
