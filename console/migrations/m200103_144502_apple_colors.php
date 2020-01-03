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
            'color' => $this->string()->notNull()
        ]);

        $this->insert('apple_colors', [
            'color' => 'green'
        ]);

        $this->insert('apple_colors', [
            'color' => 'yellow'
        ]);

        $this->insert('apple_colors', [
            'color' => 'red'
        ]);

        $this->addCommentOnColumn('apple_colors', 'color', 'Цвет');
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
