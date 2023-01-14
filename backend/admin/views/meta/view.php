<?php

use yii2custom\admin\core\ActiveForm;
use admin\widgets\ActionHeaderWidget;
use admin\widgets\FormFooterWidget;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Meta */

$this->title = Yii::t('app', 'Meta') . ': ' . StringHelper::truncate($model->title, 30);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Meta'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
?>

<div class="meta-view card">

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