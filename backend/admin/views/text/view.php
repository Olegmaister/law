<?php

use yii2custom\admin\core\ActiveForm;
use yii2custom\admin\widgets\ActionHeaderWidget;
use yii2custom\admin\widgets\FormFooterWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Text */

$this->title = Yii::t('app', 'Text') . ': ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Texts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->id;
?>

<div class="text-view card">

    <div class="card-header">
        <?= ActionHeaderWidget::widget() ?>
    </div>

    <? $form = ActiveForm::begin(['readonly' => true]) ?>

    <div class="card-body">
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