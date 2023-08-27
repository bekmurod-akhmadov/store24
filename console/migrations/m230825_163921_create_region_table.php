<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%region}}`.
 */
class m230825_163921_create_region_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%region}}', [
            'id' => $this->primaryKey(),
            'name_uz'=>$this->string(25)->notNull(),
            'name_ru'=>$this->string(50)->notNull(),
            'name_en'=>$this->string(25)->notNull()

        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%region}}');
    }
}
