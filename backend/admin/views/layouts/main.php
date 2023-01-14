<?php

/**
 * @var $this \yii\web\View
 * @var $content string
 */

use admin\assets\AppAsset;
use common\widgets\Alert;
use kartik\dialog\Dialog;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;

$guest = Yii::$app->user->isGuest;

Dialog::widget();
AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="sidebar-mini text-sm <?= $guest ? 'layout-top-nav' : '' ?>">
<?php $this->beginBody() ?>
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <? if ($guest): ?>
        <div class="container"><? endif ?>
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <? if (!$guest): ?>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                <? endif ?>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link"><?= Yii::t('app', 'Home') ?></a>
                </li>
                <? if (!Yii::$app->user->isGuest): ?>
                    <li class="nav-item d-none d-sm-inline-block">
                        <?= Html::a(Yii::t('app', 'Logout'), ['/site/logout'],
                            ['data' => ['method' => 'post'], 'class' => 'nav-link']) ?>
                    </li>
                <? endif ?>
            </ul>

            <? if (false && !$guest): ?>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                               aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            <? endif ?>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <? /* = \yii2custom\console\widgets\PrerenderWidget::widget() */ ?>
                </li>
                <? if (Yii::$app->languages->currentModel()): ?>
                    <li class="nav-item">
                        <div class="languages">
                            <div class="current-language">
                                <a href="/" title="<?= Yii::$app->languages->currentModel()->title ?>">
                                    <img alt="<?= Yii::$app->languages->currentModel()->title ?>"
                                         src="<?= Yii::getAlias('@media-web/') . Yii::$app->languages->currentModel()->image ?>">
                                </a>
                            </div>
                            <div class="languages-list">
                                <? /* @var \common\models\I18nLanguage $language */ ?>
                                <? foreach (Yii::$app->languages->models(true) as $language): ?>
                                    <? if ($language->slug != Yii::$app->language): ?>
                                        <a href="/<?= $language->slug ?>" title="<?= $language->title ?>">
                                            <img alt="<?= $language->title ?>" src="<?= $language->image ?>">
                                        </a>
                                    <? endif ?>
                                <? endforeach ?>
                            </div>
                        </div>
                    </li>
                <? endif ?>
            </ul>
            <? if ($guest): ?></div><? endif ?>
    </nav>
    <!-- Main Sidebar Container -->
    <? if (!$guest): ?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link text-center">
                <span class="brand-text font-weight-light">FDCPA Attorney</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= Yii::$app->user->identity->email ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <?= $this->render('_menu') ?>
                    </ul>
                </nav>
            </div>
        </aside>
    <? endif ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="<?= $guest ? 'container' : 'container-fluid' ?>">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <? if (!$guest): ?>
                            <h1 class="m-0 text-dark"><?= Html::encode($this->title) ?></h1>
                        <? endif ?>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-sm-right">
                            <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
                        </div>
                        <?= Alert::widget() ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="<?= $guest ? 'container' : 'container-fluid' ?>">
                <?= $content ?>
            </div>
        </div>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="container">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Copyright &copy; <?= date('Y') ?>
            </div>
            <!-- Default to the left -->
            <strong>CONSUMER</strong>ATTORNEYS
        </div>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
