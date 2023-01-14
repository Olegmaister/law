<?php

use yii2custom\admin\core\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \admin\models\forms\LoginForm */
?>

<div class="login-box">
    <div class="login-logo">
        <a href="/"><b>CONSUMER</b>ATTORNEYS</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <? $form = ActiveForm::begin(['id' => 'login-form']) ?>

            <? $append = '<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>' ?>
            <? $template = "{beginWrapper}\n<div class=\"input-group mb-3\">{input}\n$append\n{error}</div>\n{endWrapper}" ?>
            <?= $form->field($model, 'email', ['template' => $template])->textInput(['autofocus' => true, 'placeholder' => 'Email']) ?>

            <? $append = '<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>' ?>
            <? $template = "{beginWrapper}\n<div class=\"input-group mb-3\">{input}\n$append\n{error}</div>\n{endWrapper}" ?>
            <?= $form->field($model, 'password', ['template' => $template])->passwordInput(['autofocus' => true, 'placeholder' => 'Password']) ?>
            <div class="row">
                <div class="col-4 offset-8">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </div>
            <? ActiveForm::end() ?>
        </div>
    </div>
</div>