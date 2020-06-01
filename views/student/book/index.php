<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thư viện Viettel';
?>
<div class="book-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            array(
                'attribute' => 'image',
                'format' => 'html',
                'value'=>function($data) {
                    return Html::img(\Yii::$app->request->BaseUrl . '/uploads/' . $data->image, ['width' => 100, 'height' => 100]);                    },

            ),
            'name',
            'category_id',

            'author',
            'amount',
            [
                'format' => 'raw',
                'value' => function($data) {
                    if($data->amount>0)
                    return Html::a('Mượn sách', [ '/student/order/create','id' => $data->id ], ['class' => 'btn']);
                    else
//                        return Html::a('Hết sách',[ '/' ],['class' => 'btn']);
                         return Html::label('Sách đã hết',['class' => 'label']);
                  }


            ]
        ],

    ]); ?>


</div>
