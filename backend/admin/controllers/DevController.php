<?php

namespace admin\controllers;

use yii2custom\admin\core\Controller;
use yii2custom\common\core\ActiveRecord;

class DevController extends Controller
{
    public function behaviors()
    {
        return array_diff_key(parent::behaviors(), ['access' => false]);
    }

    public function actionTest()
    {
        return $this->render('index');
    }

    function actionIndex()
    {
        $ns = '\\api\\models';
        $path = \Yii::getAlias('@api/models');
        $files = glob($path . '/*.php');

        echo '<pre>';

        foreach ($files as $file) {
            /** @var ActiveRecord $model */
            $name = substr($file, strlen($path) + 1, -4);
            $class = $ns . '\\' . $name;
            $model = new $class();
            $tsGenerator = new TSGenerator();
            echo $tsGenerator->generate($model) . "\n\n";
        }

        echo '</pre>';
    }
}

class TSGenerator
{
    function generate(ActiveRecord $model)
    {
        $class = new \ReflectionClass($model);
        $fields = $this->_getFields($model);
        $res = "export interface I" . cl($model) . " {\n";
        $writeable = $model->writable();

        foreach ($fields as $field) {
            $attribute = $this->_getAttribute($class, $field);
            $res .= '  ';

            if ($attribute['readonly'] || !in_array($field, $writeable)) {
                $res .= 'readonly ';
            }
            $res .= $field . ": " . $attribute['type'] . "\n";
        }

        foreach ($model->getRelations() as $name => $relation) {
            if (!in_array($name, array_keys($model->extraFields())) && !in_array($name, $model->extraFields())) {
                continue;
            }
            $res .= '  ' . $name . ($relation->multiple ? '[]' : '') . "?: I" . cl($relation->modelClass) . "\n";
        }

        $res .= "}";
        return $res;
    }

    protected function _getFields(ActiveRecord $model)
    {
        $fields = [];
        foreach ($model->fields() as $key => $value) {
            $fields[] = is_int($key) ? $value : $key;
        }

        return $fields;
    }

    protected function _getAttribute(\ReflectionClass $class, string $field): ?array
    {
        $factory = \phpDocumentor\Reflection\DocBlockFactory::createInstance();
        $docComment = $class->getDocComment();

        if ($docComment) {
            $docblock = $factory->create($docComment);
            foreach ($docblock->getTags() as $tag) {
                if (!in_array($tag->getName(), ['property', 'property-read', 'property-write'])) {
                    continue;
                }
                preg_match('/^@property(|-read|-write) ([^ ]+?) \$([^ ]+)/', $tag->render(), $ms);

                if ($ms[3] == $field) {
                    return [
                        'type' => $this->_type($ms[2]),
                        'name' => $this->_type($ms[3]),
                        'readonly' => $ms[1] == '-read',
                        'writeonly' => $ms[1] == '-write',
                    ];
                }
            }
        }

        if ($class->getParentClass()) {
            return $this->_getAttribute($class->getParentClass(), $field);
        }

        return null;
    }

    protected function _type($type)
    {
        switch ($type) {
            case 'int':
            case 'float':
                return 'number';
                break;
        }
        return $type;
    }
}