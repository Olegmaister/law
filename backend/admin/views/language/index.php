<?php

use yii2custom\admin\core\GridView;
use admin\widgets\ActionHeaderWidget;
use common\models\I18nLanguage;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\search\I18nLanguageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Languages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="i18n-language-index card">

    <div class="card-header">
        <?= ActionHeaderWidget::widget() ?>
    </div>

    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => '\yii2custom\admin\grid\IDColumn'],

                'slug',
                'title',
                'rtl:boolean',
                [
                    'class' => '\yii2custom\admin\grid\ImageColumn',
                    'attribute' => 'image',
                ],
                [
                    'class' => '\yii2custom\admin\grid\ActionColumn',
                    'visibleButtons' => [
                        'update' => function (I18nLanguage $model) {
                            return !in_array($model->slug, I18nLanguage::SYSTEM);
                        },
                        'delete' => function (I18nLanguage $model) {
                            return !in_array($model->slug, I18nLanguage::SYSTEM);
                        },
                    ]
                ],
            ],
        ]); ?>
    </div>

</div>
