<?php

namespace api\controllers;

use yii2custom\api\core\Controller;

class FaqController extends Controller
{
    public function actions()
    {
        $actions = array_intersect_key(parent::actions(), array_flip(['index']));
        $actions['index']['conditions'] = ['type' => null];
        return $actions;
    }
}