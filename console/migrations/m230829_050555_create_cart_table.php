<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 * - `{{%user}}`
 */
class m230829_050555_create_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'count' => $this->integer()->notNull(),
            'session' => $this->string(50)->notNull(),
            'user_id' => $this->integer(),
            'added_at' => $this->dateTime()->notNull(),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-cart-product_id}}',
            '{{%cart}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-cart-product_id}}',
            '{{%cart}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-cart-user_id}}',
            '{{%cart}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-cart-user_id}}',
            '{{%cart}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-cart-product_id}}',
            '{{%cart}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-cart-product_id}}',
            '{{%cart}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-cart-user_id}}',
            '{{%cart}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-cart-user_id}}',
            '{{%cart}}'
        );

        $this->dropTable('{{%cart}}');
    }
}
