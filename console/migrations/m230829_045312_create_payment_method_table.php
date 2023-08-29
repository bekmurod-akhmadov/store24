<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_method}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%customer}}`
 */
class m230829_045312_create_payment_method_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment_method}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(),
            'card_name' => $this->string(50)->notNull(),
            'card_number' => $this->string(20)->notNull(),
            'card_expire_date' => $this->string(5)->notNull(),
        ]);

        // creates index for column `customer_id`
        $this->createIndex(
            '{{%idx-payment_method-customer_id}}',
            '{{%payment_method}}',
            'customer_id'
        );

        // add foreign key for table `{{%customer}}`
        $this->addForeignKey(
            '{{%fk-payment_method-customer_id}}',
            '{{%payment_method}}',
            'customer_id',
            '{{%customer}}',
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
            '{{%fk-payment_method-customer_id}}',
            '{{%payment_method}}'
        );

        // drops index for column `customer_id`
        $this->dropIndex(
            '{{%idx-payment_method-customer_id}}',
            '{{%payment_method}}'
        );

        $this->dropTable('{{%payment_method}}');
    }
}
