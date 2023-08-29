<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_detail}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%order}}`
 * - `{{%product}}`
 */
class m230829_044015_create_order_detail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_detail}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'count' => $this->integer()->notNull(),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            '{{%idx-order_detail-order_id}}',
            '{{%order_detail}}',
            'order_id'
        );

        // add foreign key for table `{{%order}}`
        $this->addForeignKey(
            '{{%fk-order_detail-order_id}}',
            '{{%order_detail}}',
            'order_id',
            '{{%order}}',
            'id',
            'CASCADE'
        );

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-order_detail-product_id}}',
            '{{%order_detail}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-order_detail-product_id}}',
            '{{%order_detail}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%order}}`
        $this->dropForeignKey(
            '{{%fk-order_detail-order_id}}',
            '{{%order_detail}}'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            '{{%idx-order_detail-order_id}}',
            '{{%order_detail}}'
        );

        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-order_detail-product_id}}',
            '{{%order_detail}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-order_detail-product_id}}',
            '{{%order_detail}}'
        );

        $this->dropTable('{{%order_detail}}');
    }
}
