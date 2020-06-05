<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý sách';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm sách', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',

            array(
                'attribute' => 'image',
                'format' => 'html',
                'value'=>function($data) {
                    return Html::img(\Yii::$app->request->BaseUrl . '/uploads/' . $data->image, ['width' => 100, 'height' => 150]);                    },

            ),
            'name',


            'category_id',
            'author',
            'amount',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



</div>

