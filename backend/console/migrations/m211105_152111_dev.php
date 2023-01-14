<?php

use yii2custom\console\core\Migration;

/**
 * Class m211105_152111_dev
 */
class m211105_152111_dev extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('support_message', 'referrer', $this->string(1000));
        $this->addColumn('support_message', 'url', $this->string(1000));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('support_message', 'referrer');
        $this->dropColumn('support_message', 'url');
    }
}