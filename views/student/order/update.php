<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $book app\models\Book */


$this->title = 'Cập nhật: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'book'=>$book
    ]) ?>

</div>
