<?php

use yii2custom\admin\core\GridView;
use yii2custom\admin\widgets\ActionHeaderWidget;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\search\TextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Texts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-index card">

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
                'value:ntext',

                [
                    'class' => '\yii2custom\admin\grid\EnumColumn',
                    'attribute' => 'page'
                ],

                ['class' => '\yii2custom\admin\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

</div>
