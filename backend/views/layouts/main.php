<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</head>
<body onload="$('#loader').hide();" >
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => \common\components\LanguageHelpers::loadLanguage('shop-name',"VatLieuXayDung.Com"),
        'brandUrl' => Yii::$app->homeUrl,
        'brandOptions' => [
            'class' => 'brand-op'
        ],
        'options' => [
            'class' => 'navbar-inverse',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            ['label' => 'Home', 'options' => ['onclick' => "$('#loader').show();"], 'url' => ['/site/index']],
            ['label' => 'Đơn Hàng', 'options' => ['onclick' => "$('#loader').show();"], 'url' => ['/order/index']],
            ['label' => 'Danh Mục', 'options' => ['onclick' => "$('#loader').show();"], 'url' => ['/category/index']],
            ['label' => 'Nhà SX', 'options' => ['onclick' => "$('#loader').show();"], 'url' => ['/manufacturer/index']],
            ['label' => 'Sản phẩm', 'options' => ['onclick' => "$('#loader').show();"], 'url' => ['/product/index']],
            ['label' => 'Ngôn ngữ', 'options' => ['onclick' => "$('#loader').show();"], 'url' => ['/language/index']],
            ['label' => 'Ảnh', 'options' => ['onclick' => "$('#loader').show();"], 'url' => ['/image/index']],
            ['label' => 'User', 'options' => ['onclick' => "$('#loader').show();"], 'url' => ['/user/index']],
            ['label' => 'Khách hàng', 'options' => ['onclick' => "$('#loader').show();"], 'url' => ['/customer/index']],
        ];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout', 'onclick' => "$('#loader').show();"]
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right', 'style' => 'font-size:16px;padding-top:0.7em;padding-bottom:0.7em'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <div id="loader" class="loading">
            <div>
                <div class="loader progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100"
                         aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        <span class="sr-only"></span>
                    </div>
                </div>
            </div>
        </div>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(\common\components\LanguageHelpers::loadLanguage('shop-name',"VatLieuXayDung.Com")) ?> <?= date('Y') ?></p>

        <p class="pull-right">By Website</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
