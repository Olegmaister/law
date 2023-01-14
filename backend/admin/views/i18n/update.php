<?php

use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $model \common\models\I18nSourceMessage */
/* @var $category string */

$this->title =  Yii::t('app', 'Translation') . ': ' . StringHelper::truncate($model->message, 30);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = [
    'label' => StringHelper::truncate($model->message, 30),
    'url' => ['update', 'id' => $model->id]
];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="i18n-update">

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category
    ]) ?>

</div>