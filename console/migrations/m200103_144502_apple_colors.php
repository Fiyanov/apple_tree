<?php

use yii\db\Migration;

/**
 * Class m200103_144502_apple_colors
 */
class m200103_144502_apple_colors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('apple_colors', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        $this->insert('apple_colors', [
            'name' => 'green'
        ]);

        $this->insert('apple_colors', [
            'name' => 'yellow'
        ]);

        $this->insert('apple_colors', [
            'name' => 'red'
        ]);

        $this->addCommentOnColumn('apple_colors', 'name', 'Название цвета');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('apple_colors');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200103_144502_apple_colors cannot be reverted.\n";

        return false;
    }
    */
}
