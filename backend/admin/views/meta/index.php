<?php

use yii2custom\admin\core\GridView;
use admin\widgets\ActionHeaderWidget;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\search\MetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Meta');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meta-index card">

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
                'description',
                'custom:ntext',
                'url:url',

                ['class' => '\yii2custom\admin\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

</div>
