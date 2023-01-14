<?php

namespace admin\controllers;

use yii2custom\admin\core\Controller;
use admin\models\search\I18nSourceMessageSearch;
use yii2custom\common\core\ActiveQuery;
use common\models\I18nMessage;
use common\models\I18nSourceMessage;
use Yii;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

/**
 * I18nController implements the CRUD actions for I18nSourceMessage model.
 */
class I18nController extends Controller
{
    /**
     * Lists all I18nSourceMessage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new I18nSourceMessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        /** @var ActiveQuery $query */
        $query = $dataProvider->query;
        $query->with('messages');

        Url::remember(Url::current(), 'i18n-index');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @param  int|null  $category
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id, $category = null)
    {
        $source = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $translations = Yii::$app->request->post('I18nMessage')['translations'] ?? [];
            $models = I18nMessage::find()->where([
                'id' => $id,
                'language' => array_keys($translations)
            ])->indexBy('language')->all();
            $success = true;
            $saved = false;

            foreach ($translations as $language => $message) {
                $model = $models[$language] ?? new I18nMessage(['id' => $id, 'language' => $language]);
                $model->translation = $message;

                if (!$model->save()) {
                    $success = false;
                } else {
                    $saved = true;
                }
            }

            foreach ($models as $model) {
                $model->translation = $translations[$model->language];

                if (!$model->save()) {
                    $success = false;
                } else {
                    $saved = true;
                }
            }

            if ($saved) {
                $source->updated_at = time();
                $source->save();
            }

            if ($success) {
                return $this->redirect(
                    Url::previous('i18n-index') ??
                    ['index', 'I18nSourceMessageSearch' => ['category' => $category]]
                );
            }
        }

        return $this->render('update', [
            'model' => $source,
            'category' => $category
        ]);
    }

    /**
     * Finds the I18nSourceMessage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param  integer  $id
     * @return I18nSourceMessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = I18nSourceMessage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
