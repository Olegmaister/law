<?php

use yii2custom\admin\core\ActiveForm;
use admin\widgets\ActionHeaderWidget;
use admin\widgets\FormFooterWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Review */

$this->title = Yii::t('app', 'Review') . ': ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>

<div class="review-view card">

    <? $form = ActiveForm::begin(['readonly' => true]) ?>

    <div class="card-header">
        <?= ActionHeaderWidget::widget() ?>
    </div>

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