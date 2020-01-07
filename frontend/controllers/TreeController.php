<?php
/**
 * Created by PhpStorm.
 * User: IF
 * Date: 07.01.2020
 * Time: 19:07
 */

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Apples;
use common\models\AppleStatuses;
use common\services\AppleService;

class TreeController extends Controller
{
    public function actionIndex()
    {
        (new AppleService())->updateFallenApples();

        $apples = Apples::find()->all();

        return $this->render('index', [
            'apples' => $apples
        ]);
    }
}