<?php

use yii2custom\console\core\Migration;

/**
 * Class m210406_111001_dev
 */
class m210406_111001_dev extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('i18n_language', 'image_id');
        $this->dropSchema('once', true);
        $this->dropTable('address');
        $this->dropTable('attorney_info');
        $this->dropTable('case_review_request');
        $this->dropTable('comment');
        $this->dropTable('featured');
        $this->dropTable('letter');
        $this->dropTable('practice_area_article');
        $this->dropTable('practice_area_attorney');
        $this->dropTable('practice_area_faq');
        $this->dropTable('redirect');
        $this->dropTable('social');
        $this->dropTable('post_x_tag');
        $this->dropTable('tag');
        $this->dropTable('post');
        $this->dropTable('post_image_info');
        $this->dropTable('image');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210406_111001_dev cannot be reverted.\n";

        return false;
    }
}