<?php

use yii2custom\admin\core\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \admin\models\Layout */

$this->title = Yii::t('app', 'Layout');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-6 offset-3">
        <? $form = ActiveForm::begin() ?>
        <div class="card">
            <div class="card-body">
                <?= $form->field($model, 'color_white')->textInput() ?>
                <?= $form->field($model, 'color_white_2')->textInput() ?>
                <?= $form->field($model, 'color_black')->textInput() ?>
                <?= $form->field($model, 'color_gray')->textInput() ?>
                <?= $form->field($model, 'color_gold')->textInput() ?>
                <hr>
                <?= $form->field($model, 'logo_header')->image() ?>
                <?= $form->field($model, 'logo_footer')->image() ?>
                <?= $form->field($model, 'background_1')->image() ?>
                <?= $form->field($model, 'background_2')->image() ?>
                <?= $form->field($model, 'background_3')->image() ?>
            </div>

            <div class="card-footer">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <? ActiveForm::end() ?>
    </div>
</div>