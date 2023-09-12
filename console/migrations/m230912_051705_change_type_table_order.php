<?php

use yii\db\Migration;

/**
 * Class m230912_051705_change_type_table_order
 */
class m230912_051705_change_type_table_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('order' , 'ordered_at' , $this->dateTime()->null());
        $this->alterColumn('order' , 'required_at' , $this->dateTime()->null());
        $this->alterColumn('order' , 'status' , $this->integer()->defaultValue(0));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230912_051705_change_type_table_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }
x`x`
    public function down()
    {
        echo "m230912_051705_change_type_table_order cannot be reverted.\n";

        return false;
    }
    */
}
