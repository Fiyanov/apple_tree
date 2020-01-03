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

<?php $form = ActiveForm::begin(); ?>

<?=$form->field($model, 'color')?>

<?=$form->field($model, 'status')?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
