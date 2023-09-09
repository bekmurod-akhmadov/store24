<?php

use yii\db\Migration;

/**
 * Class m230907_121547_change_customer_registered_at_type
 */
class m230907_121547_change_customer_registered_at_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('customer' , 'registered_at' , $this->dateTime()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230907_121547_change_customer_registered_at_type cannot be reverted.\n";
        $this->alterColumn('customer' , 'registered_at' , $this->dateTime()->notNull());
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230907_121547_change_customer_registered_at_type cannot be reverted.\n";

        return false;
    }
    */
}
