<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div>
    <p1 style="color:lightgreen">  <?= Html::encode($message) ?>
    </p1>
</div>
<?php
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'code')?>

    <div class="form-group">

        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('CREATE', ['class' => 'btn btn-primary']) ?>
        </div>
            <div>
            <p1>  <?= Html::encode($model->name) ?>
            </p1>
            </div>

    </div>

<?php ActiveForm::end() ?>

