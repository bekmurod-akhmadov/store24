<?php

use yii\db\Migration;

/**
 * Class m230913_115511_create_add_column_table_order
 */
class m230913_115511_create_add_column_table_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('order' , 'sum' , $this->float());
        $this->addColumn('order' , 'qty' , $this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230913_115511_create_add_column_table_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230913_115511_create_add_column_table_order cannot be reverted.\n";

        return false;
    }
    */
}
