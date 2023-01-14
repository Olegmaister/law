<?php

use yii2custom\admin\core\GridView;
use yii2custom\admin\widgets\ActionHeaderWidget;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\search\PracticeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Practices');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="practice-index card">

    <div class="card-header">
        <?= ActionHeaderWidget::widget() ?>
    </div>

    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => '\yii2custom\admin\grid\IDColumn'],

                'title',
                'text:ntext',

                [
                    'attribute' => 'status',
                    'class' => '\yii2custom\admin\grid\EnumColumn'
                ],

                ['class' => '\yii2custom\admin\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

</div>
