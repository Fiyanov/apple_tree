<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use common\models\Apples;
use common\models\AppleColors;
use common\models\AppleStatuses;
use common\models\search\ApplesSearch;

class ApplesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new ApplesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new Apples();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->save();
            $this->redirect(Url::toRoute('apples/index'));
        }

        $colors = AppleColors::find()->select(['name'])->indexBy('id')->asArray()->column();
        $statuses = AppleStatuses::find()->select(['name'])->indexBy('id')->asArray()->column();

        return $this->render('add', [
            'form' => $this->render('_form', [
                'model' => $model,
                'colors' => $colors,
                'statuses' => $statuses
            ])
        ]);
    }

    public function actionEdit($id)
    {
        if ($model = Apples::findOne($id)) {
            $model->load(Yii::$app->request->post());
            $model->save();
            $this->redirect(Url::toRoute('apples/index'));
        }

        return $this->render('add', [
            'form' => $this->render('_form', [
                'model' => $model
            ])
        ]);
    }

    public function actionDelete($id)
    {
        if ($model = Apples::findOne($id)) {

            try {
                $model->delete();
            } catch (\Exception $exception) {
                $this->redirect(Url::toRoute('apples/error'));
            }

            $this->redirect(Url::toRoute('apples/index'));
        }
    }
}
