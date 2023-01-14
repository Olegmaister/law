<?php

use common\models\Manager;
use yii2custom\console\core\Migration;

/**
 * Class m210429_135450_stat
 */
class m210429_135450_stat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $manager = new Manager([
            'email' => 'golandec93@gmail.com',
            'role' => 'stat',
            'created_by' => 1
        ]);

        $manager->setPassword('gdd547f12');
        $manager->mustSave();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Manager::deleteAll(['email' => 'golandec93@gmail.com']);
    }
}