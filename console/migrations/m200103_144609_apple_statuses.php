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
            'status' => $this->string()->notNull()
        ]);

        $this->insert('apple_statuses', [
            'status' => 'hanging'
        ]);

        $this->insert('apple_statuses', [
            'status' => 'fallen'
        ]);

        $this->insert('apple_statuses', [
            'status' => 'tainted'
        ]);

        $this->addCommentOnColumn('apple_statuses', 'status', 'Статус');
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
