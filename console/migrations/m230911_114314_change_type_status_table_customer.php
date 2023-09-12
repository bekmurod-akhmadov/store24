<?php

use yii\db\Migration;

/**
 * Class m230911_114314_change_type_status_table_customer
 */
class m230911_114314_change_type_status_table_customer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('customer' , 'status' , $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230911_114314_change_type_status_table_customer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230911_114314_change_type_status_table_customer cannot be reverted.\n";

        return false;
    }
    */
}
