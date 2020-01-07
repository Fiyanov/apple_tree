<?php
/**
 * Created by PhpStorm.
 * User: IF
 * Date: 07.01.2020
 * Time: 18:33
 */

namespace app\services;

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

    /**
     * это яблоко можно откусить?
     *
     * @param Apples $model
     * @return bool
     */
    public function isEdible(Apples $model)
    {
        //TODO: DateTime diff
        return $model->status->name === self::STATUS_FALLEN and strtotime($model->fall_date) > (time() - 3600 * 5);
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