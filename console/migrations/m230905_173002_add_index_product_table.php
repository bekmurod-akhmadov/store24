<?php

use yii\db\Migration;

/**
 * Class m230905_173002_add_index_product_table
 */
class m230905_173002_add_index_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('index-product-name', 'product', 'name');
        $this->createIndex('index-product-price', 'product', 'price');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230905_173002_add_index_product_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230905_173002_add_index_product_table cannot be reverted.\n";

        return false;
    }
    */
}
