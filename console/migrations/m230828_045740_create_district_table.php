<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%district}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%region}}`
 */
class m230828_045740_create_district_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%district}}', [
            'id' => $this->primaryKey(),
            'region_id' => $this->integer()->notNull(),
            'name_uz' => $this->string(40)->notNull(),
            'name_ru' => $this->string(80)->notNull(),
            'name_en' => $this->string(40)->notNull(),
        ]);

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-district-region_id}}',
            '{{%district}}',
            'region_id'
        );

        // add foreign key for table `{{%region}}`
        $this->addForeignKey(
            '{{%fk-district-region_id}}',
            '{{%district}}',
            'region_id',
            '{{%region}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%region}}`
        $this->dropForeignKey(
            '{{%fk-district-region_id}}',
            '{{%district}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-district-region_id}}',
            '{{%district}}'
        );

        $this->dropTable('{{%district}}');
    }
}
