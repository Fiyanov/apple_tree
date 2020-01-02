<?php

use yii\db\Migration;

/**
 * Class m200102_044921_apples
 */
class m200102_044921_apples extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('apples', [
            'id' => $this->primaryKey(),
            'color' => "ENUM('green', 'yellow', 'red', 'brown') NOT NULL",
            'status' => "ENUM('hanging', 'fallen', 'tainted') NOT NULL",
            'size' => $this->decimal(2, 2),
            'create_date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'fall_date' => $this->timestamp()->defaultValue(null)
        ]);

        $this->createIndex('apple_color', 'apples', 'color');
        $this->createIndex('apple_status', 'apples', 'status');

        $this->addCommentOnColumn('apples', 'color', 'Цвет яблока');
        $this->addCommentOnColumn('apples', 'status', 'Статус яблока');
        $this->addCommentOnColumn('apples', 'size', 'Остаток яблока в процентах');
        $this->addCommentOnColumn('apples', 'create_date', 'Дата создания');
        $this->addCommentOnColumn('apples', 'fall_date', 'Дата падения');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('apples');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200102_044921_apples cannot be reverted.\n";

        return false;
    }
    */
}
