<?php

use yii\db\Migration;

/**
 * Class m230905_173739_add_index_order_table
 */
class m230905_173739_add_index_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('index-order-ordered_at', 'order', 'ordered_at');
      
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230905_173739_add_index_order_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230905_173739_add_index_order_table cannot be reverted.\n";

        return false;
    }
    */
}
