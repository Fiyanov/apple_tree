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
    ])?>
</p>
