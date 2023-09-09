<?php

use yii\db\Migration;

/**
 * Class m230908_173847_change_customer_user_status
 */
class m230908_173847_change_customer_user_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->alterColumn('customer_user' , 'status' ,$this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230908_173847_change_customer_user_status cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230908_173847_change_customer_user_status cannot be reverted.\n";

        return false;
    }
    */
}
