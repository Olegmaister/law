<?php

use yii2custom\admin\core\ActiveForm;
use yii2custom\admin\widgets\ActionHeaderWidget;
use yii2custom\admin\widgets\FormFooterWidget;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Example */

$this->title = Yii::t('app', 'Example') . ': ' . StringHelper::truncate($model->title, 30);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Examples'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
?>

<div class="example-view card">

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