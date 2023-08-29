<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer_address}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%customer}}`
 * - `{{%region}}`
 * - `{{%district}}`
 */
class m230828_050548_create_customer_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer_address}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer()->notNull(),
            'region_id' => $this->integer(),
            'district_id' => $this->integer()->notNull(),
            'address' => $this->text()->notNull(),
            'zipcode' => $this->string(20)->notNull(),
            'phone_number' => $this->string(20)->notNull(),
        ]);

        // creates index for column `customer_id`
        $this->createIndex(
            '{{%idx-customer_address-customer_id}}',
            '{{%customer_address}}',
            'customer_id'
        );

        // add foreign key for table `{{%customer}}`
        $this->addForeignKey(
            '{{%fk-customer_address-customer_id}}',
            '{{%customer_address}}',
            'customer_id',
            '{{%customer}}',
            'id',
            'CASCADE'
        );

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-customer_address-region_id}}',
            '{{%customer_address}}',
            'region_id'
        );

        // add foreign key for table `{{%region}}`
        $this->addForeignKey(
            '{{%fk-customer_address-region_id}}',
            '{{%customer_address}}',
            'region_id',
            '{{%region}}',
            'id',
            'CASCADE'
        );

        // creates index for column `district_id`
        $this->createIndex(
            '{{%idx-customer_address-district_id}}',
            '{{%customer_address}}',
            'district_id'
        );

        // add foreign key for table `{{%district}}`
        $this->addForeignKey(
            '{{%fk-customer_address-district_id}}',
            '{{%customer_address}}',
            'district_id',
            '{{%district}}',
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
            '{{%fk-customer_address-customer_id}}',
            '{{%customer_address}}'
        );

        // drops index for column `customer_id`
        $this->dropIndex(
            '{{%idx-customer_address-customer_id}}',
            '{{%customer_address}}'
        );

        // drops foreign key for table `{{%region}}`
        $this->dropForeignKey(
            '{{%fk-customer_address-region_id}}',
            '{{%customer_address}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-customer_address-region_id}}',
            '{{%customer_address}}'
        );

        // drops foreign key for table `{{%district}}`
        $this->dropForeignKey(
            '{{%fk-customer_address-district_id}}',
            '{{%customer_address}}'
        );

        // drops index for column `district_id`
        $this->dropIndex(
            '{{%idx-customer_address-district_id}}',
            '{{%customer_address}}'
        );

        $this->dropTable('{{%customer_address}}');
    }
}
