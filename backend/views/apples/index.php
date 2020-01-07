<?php
/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\bootstrap\Html;
?>
<h1>Яблочки</h1>

<div class="panel">
    <div class="panel-body">
        <?= Html::a('Добавить яблочко', ['add'], ['class' => 'btn btn-success']) ?>
    </div>
</div>

<p>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'color_id',
                'value' => 'color.name'
            ],
            [
                'attribute' => 'status_id',
                'value' => 'status.name'
            ],
            'size',
            [
                'attribute' => 'create_fall',
                'label' => 'Часов на земле',
                'value' => function($model) {
                    return $model->getDropTimeHours();
                }
            ],
            [
                'attribute' => 'create_date',
                'value' => function($model) {
                    return $model->getFormattedDateCreate();
                }
            ],
            [
                'attribute' => 'fall_date',
                'value' => function($model) {
                    return $model->getFormattedDateFall();
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'drop' => function ($url) {
                        return Html::a(
                        '<span class="glyphicon glyphicon-arrow-down"></span>',
                            $url,
                            [
                                'title' => 'drop',
                            ]
                        );
                    },
                    'eat' => function ($url) {
                        return Html::a('<span class="glyphicon glyphicon-cutlery"></span>',
                            $url,
                            [
                                'title' => 'eat',
                            ]);
                    }
                ],
                'template' => '{eat} {drop}'
            ],
        ]
    ])?>
</p>
