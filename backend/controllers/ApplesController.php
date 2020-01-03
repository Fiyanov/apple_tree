<?php

namespace backend\controllers;

use Yii;
use common\models\Apples;
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
        if (Yii::$app->request->isPost) {
            $model = new Apples();

            $model->load(Yii::$app->request->post());
            $model->save();
            $this->redirect('/apples/index');
        }
    }

    public function actionEdit($id)
    {
        if ($model = Apples::findOne($id)) {
            $model->load(Yii::$app->request->post());
            $model->save();
            $this->redirect('/apples/index');
        }
    }

    public function actionDelete($id)
    {
        if ($model = Apples::findOne($id)) {

            try {
                $model->delete();
            } catch (\Exception $exception) {
                $this->redirect('/apples/error');
            }

            $this->redirect('/apples/index');
        }
    }
}
