<?php

namespace api\controllers;

use yii2custom\api\core\Controller;

class PracticeController extends Controller
{
    public function actions()
    {
        $actions = array_intersect_key(parent::actions(), array_flip(['index']));
        return $actions;
    }
}