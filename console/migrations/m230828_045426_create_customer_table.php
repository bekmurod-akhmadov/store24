<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%customer_user}}`
 */
class m230828_045426_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer}}', [
            'id' => $this->primaryKey(),
            'customer_user_id' => $this->integer()->notNull(),
            'first_name' => $this->string(100)->notNull(),
            'last_name' => $this->string(100)->notNull(),
            'middle_name' => $this->string(200)->notNull(),
            'gender' => $this->string(20)->notNull(),
            'birth_date' => $this->date()->notNull(),
            'registered_at' => $this->dateTime()->notNull(),
            'status' => $this->smallInteger()->notNull(),
        ]);

        // creates index for column `customer_user_id`
        $this->createIndex(
            '{{%idx-customer-customer_user_id}}',
            '{{%customer}}',
            'customer_user_id'
        );

        // add foreign key for table `{{%customer_user}}`
        $this->addForeignKey(
            '{{%fk-customer-customer_user_id}}',
            '{{%customer}}',
            'customer_user_id',
            '{{%customer_user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%customer_user}}`
        $this->dropForeignKey(
            '{{%fk-customer-customer_user_id}}',
            '{{%customer}}'
        );

        // drops index for column `customer_user_id`
        $this->dropIndex(
            '{{%idx-customer-customer_user_id}}',
            '{{%customer}}'
        );

        $this->dropTable('{{%customer}}');
    }
}
