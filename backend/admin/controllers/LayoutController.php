<?php

namespace admin\controllers;

use admin\models\Layout;
use Yii;
use yii2custom\admin\core\Controller;

class LayoutController extends Controller
{
    public function actionIndex()
    {
        $model = new Layout();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}