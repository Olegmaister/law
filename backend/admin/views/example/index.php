<?php

use yii2custom\admin\core\GridView;
use yii2custom\admin\widgets\ActionHeaderWidget;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\search\ExampleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Examples');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="example-index card">

    <div class="card-header">
        <?= ActionHeaderWidget::widget() ?>
    </div>

    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => '\yii2custom\admin\grid\IDColumn'],

                [
                    'attribute' => 'image',
                    'class' => '\yii2custom\admin\grid\ImageColumn'
                ],

                'title',

                [
                    'attribute' => 'status',
                    'class' => '\yii2custom\admin\grid\EnumColumn'
                ],

                ['class' => '\yii2custom\admin\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

</div>
