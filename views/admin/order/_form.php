<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'book_id')->textInput() ?>


    <?= $form->field($model, 'order_date')->textInput(['maxlength' => true,date('Y')]) ?>

    <?= $form->field($model, 'expiration_date')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'expiration_date')->widget(DatePicker::className(),['clientOptions' => ['dateFormat' => 'yy-mm-dd']]) ?>



    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
