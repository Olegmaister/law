<?php

namespace api\controllers;

use api\models\SupportMessage;
use Yii;
use yii\filters\VerbFilter;
use yii2custom\api\core\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [];
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'contact' => ['POST'],
                ],
            ],
        ]);
    }

    public function actionIndex()
    {
        return [
            'meta' => Yii::$app->runAction('/meta'),
            'texts' => Yii::$app->runAction('/text')
        ];
    }

    public function actionContact()
    {
        $model = new SupportMessage();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return null;
        }

        Yii::$app->response->statusCode = 422;
        return $model;
    }
}
