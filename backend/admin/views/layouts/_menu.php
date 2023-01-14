<?php

/**
 * @var $this \yii\web\View
 */

use common\models\Post;

echo admin\widgets\MenuWidget::widget([
    'items' => [
        [
            'label' => Yii::t('app', 'System'),
            'icon' => 'tachometer-alt',
            'open' => true,
            'sub' => [
                ['label' => Yii::t('app', 'Deploy'), 'controller' => 'sys'],
                ['label' => Yii::t('app', 'Layout'), 'controller' => 'layout'],
//                ['label' => Yii::t('app', 'Languages'), 'controller' => 'language'],
//                ['label' => Yii::t('app', 'Translations'), 'controller' => 'i18n'],
                ['label' => Yii::t('app', 'Meta'), 'controller' => 'meta'],
            ]
        ],
        [
            'label' => Yii::t('app', 'Content'),
            'icon' => 'tachometer-alt',
            'open' => true,
            'sub' => [
                ['label' => Yii::t('app', 'FAQ'), 'controller' => 'faq'],
                ['label' => Yii::t('app', 'Reviews'), 'controller' => 'review'],
                ['label' => Yii::t('app', 'Practices'), 'controller' => 'practice'],
                ['label' => Yii::t('app', 'Examples'), 'controller' => 'example'],
                ['label' => Yii::t('app', 'Texts'), 'controller' => 'text'],
            ]
        ],
        [
            'label' => Yii::t('app', 'Support'),
            'icon' => 'tachometer-alt',
            'open' => true,
            'sub' => [
                ['label' => Yii::t('app', 'Messages'), 'controller' => 'support'],
            ]
        ],
    ]
]);

