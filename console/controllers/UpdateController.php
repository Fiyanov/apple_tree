<?php


namespace console\controllers;

use yii\console\Controller;
use common\services\AppleService;

class UpdateController extends Controller
{
    public function actionIndex()
    {
        echo "\r\n update apples...";

        (new AppleService())->updateFallenApples();

        return 0;
    }
}