<?php

use common\models\I18nMessage;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\I18nSourceMessage */
/* @var $form yii\widgets\ActiveForm */
/* @var $category string */

/** @var \common\models\I18nMessage[] $messages */
$messages = ArrayHelper::index($model->messages, 'language');
?>

<div class="locale-form card">

    <div class="card-header">
        <?= \admin\widgets\ActionHeaderWidget::widget([
            'left' => false,
        ]) ?>
    </div>

    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">
        <?= $form->field($model, 'category')->dropDownList(Yii::$app->languages->categories(true),
            ['disabled' => true]) ?>

        <? foreach (Yii::$app->languages->list(true) as $lang): ?>
            <?= Yii::$app->languages->areaBegin($lang) ?>
            <? if ($lang == Yii::$app->languages->default()): ?>
                <?= $form->field($model, 'message')->textarea(['rows' => 1, 'disabled' => true]) ?>
            <? else: ?>
                <? $model = $messages[$lang] ?? new I18nMessage(['id' => $model->id, 'language' => $lang]) ?>
                <?= $form->field($model, 'translation')->textarea([
                    'rows' => 1,
                    'name' => 'I18nMessage[translations][' . $lang . ']'
                ])->label(Yii::t('app', 'Translation') . ' ' . $lang) ?>
            <? endif ?>
            <?= Yii::$app->languages->areaEnd() ?>
        <? endforeach ?>

    </div>

    <div class="card-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>