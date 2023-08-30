<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_comment}}`.
 */
class m230829_102152_create_product_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_comment}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'customer_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'rate' => $this->integer(),
            'status' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_comment}}');
    }
}
