<?php

use yii\db\Migration;

/**
 * Class m200107_133906_apple_position
 */
class m200107_133906_apple_position extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('apples', 'pos_x', $this->integer());
        $this->addColumn('apples', 'pos_y', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('apples', 'pos_x');
        $this->dropColumn('apples', 'pos_y');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200107_133906_apple_position cannot be reverted.\n";

        return false;
    }
    */
}
