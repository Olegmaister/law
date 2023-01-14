<?php

use common\models\I18nSourceMessage;
use yii\helpers\StringHelper;
use yii2custom\admin\core\GridView;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\search\I18nSourceMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $secondLangDataList [] */
/* @var $secondLang string */

$this->title = Yii::t('app', 'Translations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="i18-source-message-index card">
    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'enableSorting' => false,

            'columns' => [
                [
                    'attribute' => 'category',
                    'filter' => Yii::$app->languages->categories(true),
                ],

                [
                    'attribute' => 'message',
                    'value' => function (I18nSourceMessage $item) {
                        return StringHelper::truncate($item->message, 80);
                    },
                ],

                (Yii::$app->language != Yii::$app->languages->default()) ? [
                    'attribute' => 'translation',
                    'header' => Yii::t('app', 'Translation') . (
                        Yii::$app->languages->currentModel()
                            ? ('<img class="float-right" src="'
                            . (Yii::getAlias('@media-web/') . Yii::$app->languages->currentModel()->image)
                            . '" alt="' . Yii::$app->language . '">')
                            : ''
                        )
                    ,
                    'value' => function (I18nSourceMessage $item) {
                        $value = null;

                        foreach ($item->messages as $message) {
                            if ($message->language == Yii::$app->language) {
                                $value = $message->translation;
                                break;
                            }
                        }

                        return StringHelper::truncate($value, 30);
                    },
                ] : null,

                [
                    'class' => \kartik\grid\ActionColumn::class,
                    'template' => '{update}',
                    'contentOptions' => ['style' => 'width:50px'],
                    'header' => Yii::t('app', 'Actions'),

                    'buttons' => [
                        'update' => function ($url) use ($searchModel) {
                            return '<a href="' . $url . '&category=' . $searchModel->category .
                                '" title="' . Yii::t('app', 'Update') . '">' .
                                '<span class="fas fa-pencil-alt" aria-hidden="true"></span></a>';
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>
</div>