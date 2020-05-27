<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\AuthAssignment;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;




AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/logo.svg', ['alt'=>Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'icon'=> 'logo.svg',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            AuthAssignment::find()->where(['user_id'=>Yii::$app->user->getId()])->one()['item_name']=='admin' ? (
            ['label' => 'Quản lý sách', 'url' => ['/admin/book']]
            ) : (
            ['label' => 'Thư viện', 'url' => ['/student/book']]

            ),
            AuthAssignment::find()->where(['user_id'=>Yii::$app->user->getId()])->one()['item_name']=='user' ? (
            ['label' => 'Sách đã mượn', 'url' => ['/student/order']]
            ) : (
            '<li>'.'<li>'

            ),
            AuthAssignment::find()->where(['user_id'=>Yii::$app->user->getId()])->one()['item_name']=='admin' ? (
            ['label' => 'Quản lý người dùng', 'url' => ['/admin/user']]
            ) : (
                '<li>'
                . '</li>'            ),
            AuthAssignment::find()->where(['user_id'=>Yii::$app->user->getId()])->one()['item_name']=='admin' ? (
            ['label' => 'Quản lý yêu cầu mượn sách', 'url' => ['/admin/order']]
            ) : (
                '<li>'
                . '</li>'            ),
            Yii::$app->user->isGuest ? (
                ['label' => 'Đăng nhập', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Đăng xuất (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
            Yii::$app->user->isGuest ? (
                ['label' => 'Đăng kí', 'url' => ['/site/signup']]
            ) : (
                '<li>'
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
