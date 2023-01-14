<?php

namespace admin\models;

use Yii;
use yii\helpers\Inflector;
use yii\web\UploadedFile;
use yii2custom\common\behaviors\FileBehavior;
use yii2custom\common\core\Model;

class Layout extends Model
{
    protected const FILE = '@frontend/assets/local.scss';
    protected const IMAGES = ['logo_header', 'logo_footer', 'background_1', 'background_2', 'background_3'];
    protected const MAP = [
        '$white' => 'color_white',
        '$white-200' => 'color_white_2',
        '$black' => 'color_black',
        '$gray' => 'color_gray',
        '$gold' => 'color_gold',
        '.logo-icon' => 'logo_header',
        '.footer .logo-footer' => 'logo_footer',
        '.first' => 'background_1',
        '.fourth' => 'background_2',
        '.seventh' => 'background_3',
    ];

    public $color_white = '#ffffff';
    public $color_white_2 = '#fafafa';
    public $color_black = '#333333';
    public $color_gray = '#999999';
    public $color_gold = '#999999';

    /** @var UploadedFile|string */
    public $logo_header;
    /** @var UploadedFile|string */
    public $logo_footer;
    /** @var UploadedFile|string */
    public $background_1;
    /** @var UploadedFile|string */
    public $background_2;
    /** @var UploadedFile|string */
    public $background_3;

    public function init()
    {
        parent::init();
        $this->read();
    }

    public function formName()
    {
        return '';
    }

    public function behaviors()
    {
        $behaviors = [];
        foreach (static::IMAGES as $attribute) {
            $behaviors[$attribute] = [
                'class' => FileBehavior::class,
                'attribute' => $attribute,
                'name' => Inflector::camel2id(Inflector::camelize($attribute)),
                'path' => 'layout'
            ];
        }
        return array_merge(parent::behaviors(), $behaviors);
    }

    public function rules()
    {
        return [
            [['color_white', 'color_white_2', 'color_black', 'color_gray', 'color_gold'], 'string', 'max' => 255],
            [static::IMAGES, 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function beforeValidate()
    {
        foreach (static::IMAGES as $attribute) {
            /** @var FileBehavior $behaviour */
            $behaviour = $this->getBehavior($attribute);
            $behaviour && $behaviour->prepare();
        }

        return parent::beforeValidate();
    }

    public function save(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        $data = [];
        foreach ($this->attributes as $attribute => $value) {
            $value = trim($value);
            if (strlen($value)) {
                if (!in_array($attribute, static::IMAGES)) {
                    $data[] = $this->name($attribute) . ': ' . $value . ';';
                }
            }
        }

        foreach (static::IMAGES as $attribute) {
            /** @var FileBehavior $behaviour */
            $behaviour = $this->getBehavior($attribute);
            if ($behaviour) {
                $this->{$attribute} ? $behaviour->save() : $behaviour->find();
            }

            if ($this->{$attribute}) {
                $selector = $this->name($attribute);
                $image = Yii::getAlias('@media-web/') . $this->{$attribute};
                $data[] = $selector . ' { background-image: url(\'' . $image . '\')!important }';
            }
        }

        $file = Yii::getAlias(self::FILE);
        file_put_contents($file, join("\n", $data));

        return true;
    }

    protected function read()
    {
        foreach (static::IMAGES as $attribute) {
            /** @var FileBehavior $behaviour */
            $behaviour = $this->getBehavior($attribute);
            $behaviour && $behaviour->find();
        }

        $file = Yii::getAlias(self::FILE);
        if (file_exists($file)) {
            $contents = file_get_contents($file);
            if (preg_match_all('/(\$[\d\w-]+): (.+);/', $contents, $ms)) {
                foreach ($ms[1] as $key => $name) {
                    $attribute = $this->attribute($name);
                    if (!in_array($attribute, static::IMAGES)) {
                        $this->{$attribute} = $ms[2][$key];
                    }
                }
            }
        }
    }

    protected function attribute(string $name)
    {
        return static::MAP[$name];
    }

    protected function name(string $attribute)
    {
        return array_search($attribute, static::MAP);
    }

    public function getRule(string $attribute, string $type): ?array
    {
        foreach ($this->rules() as $rule) {
            $rule[0] = is_array($rule[0]) ? $rule[0] : [$rule[0]];
            if (in_array($attribute, $rule[0]) && $type == $rule[1]) {
                return $rule;
            }
        }

        return null;
    }
}