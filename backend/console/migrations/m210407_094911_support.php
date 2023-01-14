<?php

use yii2custom\console\core\Migration;

/**
 * Class m210407_094911_support
 */
class m210407_094911_support extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('support_message', 'title');
        $this->dropColumn('support_message', 'support_message_id');
        $this->addColumn('support_message', 'info', $this->jsonb());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210407_094911_support cannot be reverted.\n";

        return false;
    }
}