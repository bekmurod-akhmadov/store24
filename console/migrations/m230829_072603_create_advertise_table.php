<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%advertise}}`.
 */
class m230829_072603_create_advertise_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%advertise}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(255),
            'title' => $this->string(255),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'status' => $this->integer()->defaultValue(0)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%advertise}}');
    }
}
