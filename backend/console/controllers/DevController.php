<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Inflector;
use yii2custom\common\core\ActiveRecord;

class DevController extends Controller
{
    public function actionGiiModel(string $tableName, ?string $modelClass = null, ?string $ns = null)
    {
        $modelClass = $name ?? Inflector::camelize($tableName);
        $ns = $ns ?? 'common\\\\models';
        $baseClass = str_replace('\\', '\\\\', ActiveRecord::class);

        echo `./yii gii/model --enableI18N=1 --interactive=0 --overwrite=1 --generateRelationsFromCurrentSchema=0 --useSchemaName=0 --ns=$ns --tableName=$tableName --modelClass=$modelClass --baseClass=$baseClass`;
    }

    public function actionGiiCrud(string $table, ?string $name = null)
    {
        $name = $name ?? $table;
        $modelClass = 'common\\\\models\\\\' . Inflector::camelize($table);
        $searchModelClass = 'admin\\\\models\\\\search\\\\' . Inflector::camelize($table) . 'Search';
        $baseControllerClass = 'yii2custom\\\\admin\\\\core\\\\Controller';
        $controllerClass = 'admin\\\\controllers\\\\' . Inflector::camelize($name) . 'Controller';
        $viewPath = 'admin\\\\views\\\\' . str_replace('_', '-', $name);

        echo `./yii gii/crud --enableI18N=1 --interactive=0 --overwrite=1 --modelClass=$modelClass --searchModelClass=$searchModelClass --baseControllerClass=$baseControllerClass --controllerClass=$controllerClass --viewPath=$viewPath`;
    }

    public function actionI18n()
    {
        $languages = Yii::$app->languages->list();
        system('./yii message common/config/i18n.php -l "' . join(',', $languages) . '"');
    }

}