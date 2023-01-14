<?php

namespace admin\controllers;

use yii2custom\admin\core\Controller;
use admin\models\forms\LoginForm;
use yii2custom\console\Prerender;
use Yii;
use yii\web\ErrorAction;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        if (in_array($this->action->id, ['login', 'logout', 'error'])) {
            return array_diff_key(parent::behaviors(), ['access' => false]);
        }
        return $behaviors;
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ]
        ];
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * @param string $lang
     * @return \yii\web\Response
     * @see \yii2custom\common\components\Languages::detect() at admin/config/main.php
     */
    public function actionSetLanguage(string $lang)
    {
        return $this->redirect(\Yii::$app->request->referrer ?? '/');
    }

    public function actionPrerenderStart()
    {
        return Prerender::start();
    }

    public function actionPrerenderStatus()
    {
        return Prerender::status();
    }

    public function actionPrerenderStop()
    {
        return Prerender::stop();
    }

    public function actionDev()
    {
        return $this->render('dev');
    }
}
