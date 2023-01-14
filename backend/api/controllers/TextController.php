<?php

namespace api\controllers;

use yii2custom\api\core\Controller;

class TextController extends Controller
{
    public function actions()
    {
        return array_intersect_key(parent::actions(), array_flip(['index']));
    }
}