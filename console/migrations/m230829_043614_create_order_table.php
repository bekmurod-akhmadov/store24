<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%customer}}`
 * - `{{%customer_address}}`
 */
class m230829_043614_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(),
            'ordered_at' => $this->dateTime()->notNull(),
            'customer_address_id' => $this->integer(),
            'status' => $this->smallInteger()->notNull(),
            'required_at' => $this->dateTime()->notNull(),
        ]);

        // creates index for column `customer_id`
        $this->createIndex(
            '{{%idx-order-customer_id}}',
            '{{%order}}',
            'customer_id'
        );

        // add foreign key for table `{{%customer}}`
        $this->addForeignKey(
            '{{%fk-order-customer_id}}',
            '{{%order}}',
            'customer_id',
            '{{%customer}}',
            'id',
            'CASCADE'
        );

        // creates index for column `customer_address_id`
        $this->createIndex(
            '{{%idx-order-customer_address_id}}',
            '{{%order}}',
            'customer_address_id'
        );

        // add foreign key for table `{{%customer_address}}`
        $this->addForeignKey(
            '{{%fk-order-customer_address_id}}',
            '{{%order}}',
            'customer_address_id',
            '{{%customer_address}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%customer}}`
        $this->dropForeignKey(
            '{{%fk-order-customer_id}}',
            '{{%order}}'
        );

        // drops index for column `customer_id`
        $this->dropIndex(
            '{{%idx-order-customer_id}}',
            '{{%order}}'
        );

        // drops foreign key for table `{{%customer_address}}`
        $this->dropForeignKey(
            '{{%fk-order-customer_address_id}}',
            '{{%order}}'
        );

        // drops index for column `customer_address_id`
        $this->dropIndex(
            '{{%idx-order-customer_address_id}}',
            '{{%order}}'
        );

        $this->dropTable('{{%order}}');
    }
}
