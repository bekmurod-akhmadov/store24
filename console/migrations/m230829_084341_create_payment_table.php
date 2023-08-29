<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%order}}`
 * - `{{%payment_system}}`
 */
class m230829_084341_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'amount' => $this->integer(),
            'payment_system_id' => $this->integer(),
            'transaction_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'status' => $this->smallInteger(),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            '{{%idx-payment-order_id}}',
            '{{%payment}}',
            'order_id'
        );

        // add foreign key for table `{{%order}}`
        $this->addForeignKey(
            '{{%fk-payment-order_id}}',
            '{{%payment}}',
            'order_id',
            '{{%order}}',
            'id',
            'CASCADE'
        );

        // creates index for column `payment_system_id`
        $this->createIndex(
            '{{%idx-payment-payment_system_id}}',
            '{{%payment}}',
            'payment_system_id'
        );

        // add foreign key for table `{{%payment_system}}`
        $this->addForeignKey(
            '{{%fk-payment-payment_system_id}}',
            '{{%payment}}',
            'payment_system_id',
            '{{%payment_system}}',
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
            '{{%fk-payment-order_id}}',
            '{{%payment}}'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            '{{%idx-payment-order_id}}',
            '{{%payment}}'
        );

        // drops foreign key for table `{{%payment_system}}`
        $this->dropForeignKey(
            '{{%fk-payment-payment_system_id}}',
            '{{%payment}}'
        );

        // drops index for column `payment_system_id`
        $this->dropIndex(
            '{{%idx-payment-payment_system_id}}',
            '{{%payment}}'
        );

        $this->dropTable('{{%payment}}');
    }
}
