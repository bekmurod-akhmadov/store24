<?php

use yii\db\Migration;

/**
 * Class m230905_173230_add_foreign_key_product_table
 */
class m230905_173230_add_foreign_key_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('index-product-category_id', 'product', 'category_id');
        $this->addForeignKey('fkey-product-category_id', 'product', 'category_id', 'category', 'id', 'CASCADE', 'CASCADE');
        
        $this->createIndex('index-product-brand_id', 'product', 'brand_id');
        $this->addForeignKey('fkey-product-brand_id', 'product', 'brand_id', 'brand', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230905_173230_add_foreign_key_product_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230905_173230_add_foreign_key_product_table cannot be reverted.\n";

        return false;
    }
    */
}
