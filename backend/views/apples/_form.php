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

<?=$form->field($model, 'color_id')->dropDownList($colors);?>

<?=$form->field($model, 'size')->input('number', ['min' => 0.1, 'max' => 1, 'step' => 0.1, 'value' => 1.0])?>

<?=$form->field($model, 'status_id')->dropDownList($statuses)?>

<?=$form->field($model, 'pos_x')->input('number', ['min' => 1, 'max' => 400, 'step' => 1, 'value' => rand(1, 400)])?>

<?=$form->field($model, 'pos_y')->input('number', ['min' => 1, 'max' => 600, 'step' => 1, 'value' => rand(1, 600)])?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
