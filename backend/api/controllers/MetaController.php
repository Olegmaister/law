<?php

namespace api\controllers;

use yii2custom\api\core\Controller;

class MetaController extends Controller
{
    public function actions()
    {
        $actions = array_intersect_key(parent::actions(), array_flip(['index', 'view']));
        $actions['index']['conditions'] = ['not', ['url' => null]];
        return $actions;
    }
}