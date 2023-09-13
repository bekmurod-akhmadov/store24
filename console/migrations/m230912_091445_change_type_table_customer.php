<?php

use yii\db\Migration;

/**
 * Class m230912_091445_change_type_table_customer
 */
class m230912_091445_change_type_table_customer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('customer' , 'gender' , $this->integer()->null());
        $this->alterColumn('customer' , 'birth_date' , $this->dateTime()->null());
        $this->alterColumn('customer' , 'middle_name' , $this->string()->null());
//        $this->alterColumn('customer' , 'customer_user_id ' , $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230912_091445_change_type_table_customer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230912_091445_change_type_table_customer cannot be reverted.\n";

        return false;
    }
    */
}
