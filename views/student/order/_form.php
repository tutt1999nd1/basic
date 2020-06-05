<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $book app\models\Order */

/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'book_id')->textInput() ?>
    <?= $form->field($book, 'name')->textInput(['disabled'=>true]) ?>
    <?= $form->field($model, 'order_date')->textInput(['disabled'=>true,'maxlength' => true]) ?>
    <?= $form->field($model, 'expiration_date')->textInput(['disabled'=>true,'maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Xác nhận', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>