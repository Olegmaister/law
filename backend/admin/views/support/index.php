<?php

use admin\models\SupportMessage;
use yii2custom\admin\core\GridView;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\search\SupportMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Support Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-message-index card">

    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'rowOptions' => function (SupportMessage $model) {
                if (!$model->status) {
                    return ['class' => 'table-success'];
                } else if ($model->status == $model::STATUS_ARCHIVE) {
                    return ['class' => 'table-danger'];
                }

//                else if ($model->status == $model::STATUS_ANSWER) {
//                    return ['class' => 'table-warning'];
//                }

                return [];
            },
            'columns' => [
                ['class' => '\yii2custom\admin\grid\IDColumn'],

                'created_at:dateTime',
                'email:email',
                'phone',
                'name',
                'message:ntext',

                [
                    'class' => '\yii2custom\admin\grid\EnumColumn',
                    'attribute' => 'status'
                ],

                [
                    'class' => '\yii2custom\admin\grid\ActionColumn',
                    'visibleButtons' => ['update' => false, 'delete' => function (SupportMessage $model) {
                        return $model->status != $model::STATUS_ARCHIVE;
                    }]
                ],
            ],
        ]); ?>
    </div>

</div>
