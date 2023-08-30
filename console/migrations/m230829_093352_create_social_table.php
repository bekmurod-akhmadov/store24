<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%social}}`.
 */
class m230829_093352_create_social_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%social}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'icon' => $this->string(100),
            'url' => $this->string(100),
            'status' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%social}}');
    }
}
