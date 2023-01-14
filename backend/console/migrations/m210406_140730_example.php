<?php

use yii2custom\console\core\Migration;

/**
 * Class m210406_140730_example
 */
class m210406_140730_example extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('example', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique(),
            'priority' => $this->integer()->notNull(),
            'status' => $this->tinyInteger()->notNull()->defaultValue(10),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('example');
    }
}