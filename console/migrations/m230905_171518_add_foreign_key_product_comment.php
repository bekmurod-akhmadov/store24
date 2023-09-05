<?php

use yii\db\Migration;

/**
 * Class m230905_171518_add_foreign_key_product_comment
 */
class m230905_171518_add_foreign_key_product_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->delete('product_comment', ['product_id' => 9]);
        $this->createIndex('index-product_comment-product_id', 'product_comment', 'product_id');
        $this->addForeignKey('fkey-product_comment-product_id', 'product_comment', 'product_id', 'product', 'id', 'CASCADE', 'CASCADE');

        $this->delete('product_char', ['product_id' => 9]);
        $this->createIndex('index-product_char-product_id', 'product_char', 'product_id');
        $this->addForeignKey('fkey-product_char-product_id', 'product_char', 'product_id', 'product', 'id', 'CASCADE', 'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230905_171518_add_foreign_key_product_comment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230905_171518_add_foreign_key_product_comment cannot be reverted.\n";

        return false;
    }
    */
}
