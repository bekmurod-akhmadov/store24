<?php

use yii\db\Migration;

/**
 * Class m230908_112432_change_type_customer_user_confirmation_code
 */
class m230908_112432_change_type_customer_user_confirmation_code extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('customer_user'  , 'confirmation_code' , $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230908_112432_change_type_customer_user_confirmation_code cannot be reverted.\n";
        $this->alterColumn('customer_user'  , 'confirmation_code' , $this->integer());

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230908_112432_change_type_customer_user_confirmation_code cannot be reverted.\n";

        return false;
    }
    */
}
