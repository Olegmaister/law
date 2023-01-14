<?php

namespace admin\controllers;

use Yii;
use yii2custom\admin\core\Controller;

class SysController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'backend' => !$this->busy(Yii::getAlias('@root'), 'deploy'),
            'frontend' => !$this->busy(Yii::getAlias('@frontend'), 'deploy'),
        ]);
    }

    public function actionFrontend()
    {
        [$status, $output] = $this->live(Yii::getAlias('@frontend'), 'deploy');
        die(json_encode(['status' => $status, 'output' => $output]));
    }

    public function actionBackend()
    {
        [$status, $output] = $this->live(Yii::getAlias('@root'), 'deploy');
        die(json_encode(['status' => $status, 'output' => $output]));
    }

    protected function live($path, $file)
    {
        if ($this->busy($path, $file)) {
            return [1, 'Process already launched.'];
        }

        exec('chmod +x ' . $path . '/' . $file);
        pclose(popen("cd $path && ./$file" . ' > /dev/null 2>&1 &', 'r'));
        return [0, 'OK'];
    }

    public function actionCheck()
    {
        return json_encode([
            'backend' => !$this->busy(Yii::getAlias('@root'), 'deploy'),
            'frontend' => !$this->busy(Yii::getAlias('@frontend'), 'deploy'),
        ]);
    }

    protected function busy($path, $file)
    {
        $pidFile = $path . '/' . $file . '.pid';
        if (file_exists($pidFile)) {
            $pid = file_get_contents($pidFile);
            exec("ps aux | grep " . $pid . " | wc -l", $output);
            if (count($output) > 2) {
                return true;
            }
        }

        return false;
    }
}