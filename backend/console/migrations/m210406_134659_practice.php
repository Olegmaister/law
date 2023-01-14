<?php

use yii2custom\console\core\Migration;

/**
 * Class m210406_134659_practice
 */
class m210406_134659_practice extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('practice', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique(),
            'text' => $this->string()->notNull(),
            'priority' => $this->integer()->notNull(),
            'status' => $this->tinyInteger()->notNull()->defaultValue(10),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('practice');
    }
}