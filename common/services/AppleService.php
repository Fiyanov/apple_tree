<?php
/**
 * Created by PhpStorm.
 * User: IF
 * Date: 07.01.2020
 * Time: 18:33
 */

namespace common\services;

use yii\db\Expression;
use common\models\Apples;
use common\models\AppleStatuses;

class AppleService
{
    const STATUS_HANGING = 'hanging';
    const STATUS_FALLEN = 'fallen';
    const STATUS_TAINTED = 'tainted';

    /**
     * Уронить яблочко
     *
     * @param Apples $model
     * @return bool
     */
    public function fall(Apples $model)
    {
        $status = AppleStatuses::findOne([
            'name' => self::STATUS_FALLEN
        ]);

        $model->pos_x = rand(1, 400);
        $model->pos_y = rand(1, 30);
        $model->status_id = $status->id;
        $model->fall_date = new Expression('NOW()');
        return $model->save();
    }

    /**
     * Кусаем яблоко
     *
     * @param Apples $model
     * @param $bite_size
     * @return mixed
     * @throws \Exception
     */
    public function bite(Apples $model, $bite_size)
    {
        if (!$this->isEdible($model) or $this->isEmpty($model)) {
            throw new \Exception('Это яблочко нельзя скушать!');
        }

        $model->size -= $bite_size / 100;
        return $model->save();
    }

    public function updateFallenApples()
    {
        $status = AppleStatuses::findOne([
            'name' => self::STATUS_TAINTED
        ]);

        $apples = Apples::find()->where('fall_date < NOW() - INTERVAL 5 HOUR')->all();

        /**@var $apple Apples*/
        foreach ($apples as $apple) {
            $apple->status_id = $status->id;
            $apple->save();
        }
    }

    /**
     * это яблоко можно откусить?
     *
     * @param Apples $model
     * @return bool
     */
    public function isEdible(Apples $model)
    {
        return $model->status->name === self::STATUS_FALLEN and $model->status->name !== self::STATUS_TAINTED;
    }

    /**
     * это яблоко съедено?
     *
     * @param Apples $model
     * @return bool
     */
    public function isEmpty(Apples $model)
    {
        return $model->size <= 0;
    }
}