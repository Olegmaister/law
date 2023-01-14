<?php

use yii2custom\admin\core\ActiveForm;
use admin\widgets\ActionHeaderWidget;
use admin\widgets\FormFooterWidget;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $model common\models\I18nLanguage */

$this->title = Yii::t('app', 'Language') . ': ' . StringHelper::truncate($model->title, 30);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
?>

<div class="i18n-language-view card">

    <? $form = ActiveForm::begin(['readonly' => true]) ?>

    <div class="card-header">
        <?= ActionHeaderWidget::widget(['left' => [
            'update' => !in_array($model->slug, $model::SYSTEM),
            'delete' => !in_array($model->slug, $model::SYSTEM)
        ]]) ?>
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