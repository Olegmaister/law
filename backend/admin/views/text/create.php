<?php

use yii2custom\admin\core\ActiveForm;
use yii2custom\admin\widgets\ActionHeaderWidget;
use yii2custom\admin\widgets\FormFooterWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Text */

$this->title = Yii::t('app', 'Text') . ': ' . Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Texts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>

<div class="text-create card">

    <div class="card-header">
        <?= ActionHeaderWidget::widget() ?>
    </div>

    <? $form = ActiveForm::begin() ?>

    <div class="card-body">
        <? if ($model->hasErrors("")): ?>
          <div class="error-summary">
            <?= $model->getFirstError("") ?>
          </div>
        <? endif ?>

        <?= $this->render('_form', [
            'model' => $model,
            'form' => $form
        ]) ?>
    </div>

    <div class="card-footer">
        <?= FormFooterWidget::widget(['form' => $form, 'model' => $model]) ?>
    </div>

    <? ActiveForm::end() ?>

</div>
