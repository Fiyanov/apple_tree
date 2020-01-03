<?php
/**
 * Created by PhpStorm.
 * User: IF
 * Date: 02.01.2020
 * Time: 12:47
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin();?>

<?=$form->field($model, 'color')->dropDownList($colors);?>

<?=$form->field($model, 'size')->input('number', ['min' => 0.1, 'max' => 1, 'step' => 0.1, 'value' => 1.0])?>

<?=$form->field($model, 'status')->dropDownList($statuses)?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
