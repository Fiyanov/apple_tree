<?php

namespace common\models;

/**
 * This is the model class for table "apples".
 *
 * @property int $id
 * @property string $color_id Цвет яблока
 * @property string $status_id Статус яблока
 * @property float|null $size Остаток яблока в процентах
 * @property string|null $create_date Дата создания
 * @property string|null $fall_date Дата падения
 */
class Apples extends \yii\db\ActiveRecord
{
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
            [['color_id', 'status_id'], 'required'],
            [['color_id', 'status_id'], 'integer'],
            [['pos_x', 'pos_y'], 'integer'],
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
            'color_id' => 'Цвет яблока',
            'status_id' => 'Статус яблока',
            'size' => 'Остаток яблока в процентах',
            'create_date' => 'Дата создания',
            'fall_date' => 'Дата падения',
            'pos_x' => 'Позиция X',
            'pos_y' => 'Позиция Y'
        ];
    }

    public function getColor()
    {
        return $this->hasOne(AppleColors::className(), ['id' => 'color_id']);
    }

    public function getStatus()
    {
        return $this->hasOne(AppleStatuses::className(), ['id' => 'status_id']);
    }

    public function getDateCreateTimestamp()
    {
        return strtotime($this->create_date);
    }

    public function getDateFallTimestamp()
    {
        return strtotime($this->fall_date);
    }

    public function getFormattedDateCreate()
    {
        return date('d.m.Y H:m:i', $this->getDateCreateTimestamp());
    }

    public function getFormattedDateFall()
    {
        return $this->getDateFallTimestamp() ? date('d.m.Y H:m:i', $this->getDateFallTimestamp()) : false;
    }

    public function getDropTimeHours()
    {
        return $this->getDateFallTimestamp() ? round((time() - $this->getDateFallTimestamp()) / 3600, 1) : false;
    }
}
