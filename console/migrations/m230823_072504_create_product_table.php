<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m230823_072504_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'price' => $this->float()->notNull(),
            'sale_price' => $this->float(),
            'image' => $this->string(255),
            'category_id' => $this->integer()->notNull(),
            'brand_id' => $this->integer()->notNull(),
            'color_id' => $this->integer(),
            'availability' => $this->integer()->defaultValue(1),
            'status' => $this->integer()->defaultValue(1),
            'sale' => $this->integer()->defaultValue(0),
            'new' => $this->integer()->defaultValue(0),
            'bestseller' => $this->integer()->defaultValue(0),
            'top' => $this->integer()->defaultValue(0),
            'totalCount' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
