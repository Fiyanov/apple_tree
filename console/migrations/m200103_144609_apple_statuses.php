<?php

use yii\db\Migration;

/**
 * Class m200103_144609_apple_statuses
 */
class m200103_144609_apple_statuses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('apple_statuses', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        $this->insert('apple_statuses', [
            'name' => 'hanging'
        ]);

        $this->insert('apple_statuses', [
            'name' => 'fallen'
        ]);

        $this->insert('apple_statuses', [
            'name' => 'tainted'
        ]);

        $this->addCommentOnColumn('apple_statuses', 'name', 'Название статуса');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('apple_statuses');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200103_144609_apple_statuses cannot be reverted.\n";

        return false;
    }
    */
}
