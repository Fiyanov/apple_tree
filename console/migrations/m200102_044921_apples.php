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
            'color_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'size' => $this->decimal(3, 2)->defaultValue(1),
            'create_date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'fall_date' => $this->timestamp()->defaultValue(null)
        ]);

        $this->createIndex('apple_color', 'apples', 'color_id');
        $this->createIndex('apple_status', 'apples', 'status_id');

        $this->addCommentOnColumn('apples', 'color_id', 'Цвет яблока');
        $this->addCommentOnColumn('apples', 'status_id', 'Статус яблока');
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
