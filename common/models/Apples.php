<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "apples".
 *
 * @property int $id
 * @property string $color Цвет яблока
 * @property string $status Статус яблока
 * @property float|null $size Остаток яблока в процентах
 * @property string|null $create_date Дата создания
 * @property string|null $fall_date Дата падения
 */
class Apples extends \yii\db\ActiveRecord
{
    const STATUS_HANGING = 'hanging';
    const STATUS_FALLEN = 'fallen';
    const STATUS_TAINTED = 'tainted';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apples';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['color', 'status'], 'required'],
            [['color', 'status'], 'integer'],
            [['size'], 'number'],
            [['create_date', 'fall_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'color' => 'Цвет яблока',
            'status' => 'Статус яблока',
            'size' => 'Остаток яблока в процентах',
            'create_date' => 'Дата создания',
            'fall_date' => 'Дата падения',
        ];
    }

    public function getColor()
    {
        return $this->hasOne(AppleColors::class, ['id', 'color']);
    }

    public function getStatus()
    {
        return $this->hasOne(AppleStatuses::class, ['id', 'status']);
    }

    /**
     * это яблоко можно откусить?
     *
     * @return bool
     */
    public function isEdible()
    {
        return $this->status === self::STATUS_FALLEN and $this->fall_date < 5;
    }

    /**
     * это яблоко съедено?
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->size <= 0;
    }

    /**
     * Кусаем яблоко
     *
     * @param $bite_size
     * @return bool
     * @throws \Exception
     */
    public function bite($bite_size)
    {
        if (!$this->isEdible()) {
            throw new \Exception('Это яблочко нельзя скушать!');
        }

        $this->size -= $bite_size / 100;
        return $this->save();
    }

    public function fall()
    {
        $this->status = self::STATUS_FALLEN;
        return $this->save();
    }
}
