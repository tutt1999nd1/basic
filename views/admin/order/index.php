<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách đơn mượn sách';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'user_id',
            'book_id',
            'order_date',
            'expiration_date',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
