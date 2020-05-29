<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $categories app\models\Category */
/* @var $form yii\widgets\ActiveForm */
$categories=\app\models\Category::find()->all();
$listData=ArrayHelper::map($categories,'id','name');

?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'category_id')->dropDownList(
        $listData,
        ['prompt'=>'Select...']
    ); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>
    <?= $form->field($model, 'image')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
