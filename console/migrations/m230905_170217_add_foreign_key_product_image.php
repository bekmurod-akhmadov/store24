<?php

use yii\db\Migration;

/**
 * Class m230905_170217_add_foreign_key_product_image
 */
class m230905_170217_add_foreign_key_product_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->delete('product_image', ['product_id' => 9]);
        $this->createIndex('index-product_image-product_id', 'product_image', 'product_id');
        $this->addForeignKey('fkey-product_image-product_id', 'product_image', 'product_id', 'product', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230905_170217_add_foreign_key_product_image cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230905_170217_add_foreign_key_product_image cannot be reverted.\n";

        return false;
    }
    */
}
