<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer_user}}`.
 */
class m230828_043740_create_customer_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer_user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(20)->notNull(),
            'confirmation_code' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNUll(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%customer_user}}');
    }
}
