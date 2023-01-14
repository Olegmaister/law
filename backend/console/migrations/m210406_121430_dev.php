<?php

use yii2custom\console\core\Migration;

/**
 * Class m210406_121430_dev
 */
class m210406_121430_dev extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->truncateTable('text', true);
        $this->alterColumn('text', 'page', $this->string()->notNull());
        $this->dropColumn('review', 'position');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210406_121430_dev cannot be reverted.\n";

        return false;
    }
}