<?php

use yii2custom\admin\core\ActiveForm;
use admin\widgets\ActionHeaderWidget;
use admin\widgets\FormFooterWidget;

/* @var $this yii\web\View */
/* @var $model common\models\I18nLanguage */

$this->title = Yii::t('app', 'Language') . ': ' . Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>

<div class="i18n-language-create card">

    <? $form = ActiveForm::begin() ?>

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
