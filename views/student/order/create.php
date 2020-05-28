<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $book app\models\Book */


$this->title = 'Mượn sách:';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'book'=> $book
    ]) ?>

</div>
