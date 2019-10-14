<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%users}}`.
 */
class m191014_040831_add_new_column_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%users}}', 'useername', $this->string());
        $this->addColumn('{{%users}}', 'auth_key', $this->string(32));
        $this->addColumn('{{%users}}', 'password_hash', $this->string()->notNull());
        $this->addColumn('{{%users}}', 'password_reset_token', $this->string()->unique());
        $this->addColumn('{{%users}}', 'email', $this->string()->notNull()->unique());
        $this->addColumn('{{%users}}', 'created_at', $this->integer()->notNull());
        $this->addColumn('{{%users}}', 'updated_at', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%users}}', 'useername');
        $this->dropColumn('{{%users}}', 'auth_key');
        $this->dropColumn('{{%users}}', 'password_hash');
        $this->dropColumn('{{%users}}', 'password_reset_token');
        $this->dropColumn('{{%users}}', 'email');
        $this->dropColumn('{{%users}}', 'created_at');
        $this->dropColumn('{{%users}}', 'updated_at');
    }
}
