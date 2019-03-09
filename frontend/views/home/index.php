<?php
use common\components\LanguageHelpers;
use frontend\views\widgets\ProductSingle;

/**
 * @var \common\models\db\Category[] $cateSearch
 * @var \common\models\db\Category[] $cates
 * @var \common\models\db\Product[] $product_hot
 * @var \common\models\db\Image[] $image_slider
 * @var \common\models\db\Image[] $image_block3
 * @var \common\models\db\Image[] $image_block3_2
 * @var \common\models\db\Product[] $product_hot_sale
 */

if(isset($product_hot_sale[0])){
    $topPro = $product_hot_sale[0];
    unset($product_hot_sale[0]);
}else{
    $topPro= new \common\models\db\Product();
}
?>

<script>
    // Set the date we're counting down to
    var countDownDate = <?= $topPro->expired_time_sale_price * 1000?>;

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("countdownD").innerHTML = days + " D";
        document.getElementById("countdownH").innerHTML = hours + " H";
        document.getElementById("countdownM").innerHTML = minutes + " M";
        document.getElementById("countdownS").innerHTML = seconds + " S";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdownD").innerHTML = 0 + " D";
            document.getElementById("countdownH").innerHTML = 0 + " H";
            document.getElementById("countdownM").innerHTML = 0 + " M";
            document.getElementById("countdownS").innerHTML = 0 + " S";
            // document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
<!-- HOME -->
<div id="home">
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <div class="home-wrap">
            <!-- home slick -->
            <div id="home-slick">
                <?php foreach ($image_slider as $imgSlider){?>
                    <div class="banner banner-1">
                        <img src="<?= $imgSlider->url ?>" alt="">
                        <div class="banner-caption text-center">
                            <h1><?= $imgSlider->title ?></h1>
                            <h3 class="white-color font-weak"><?= $imgSlider->description ?></h3>
                            <a href="<?= $imgSlider->link_page ? $imgSlider->link_page : '#' ?>" class="primary-btn"><?= LanguageHelpers::loadLanguage("shop_now","Mua sắm ngay") ?></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- /home slick -->
        </div>
        <!-- /home wrap -->
    </div>
    <!-- /container -->
</div>
<!-- /HOME -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <?php foreach ($image_block3 as $key => $imgBanner){
                if($key > 2){break;}
                ?>
                <!-- banner -->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <a class="banner banner-1" href="<?= $imgBanner->link_page ?>">
                        <img src="<?= $imgBanner->url ?>" style="height: 260px" alt="<?= $imgBanner->description ?>">
                        <div class="banner-caption text-center">
                            <h2 class="white-color"><?= $imgBanner->title ?></h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->
            <?php } ?>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title"><?= LanguageHelpers::loadLanguage("deal-top","Top sản phẩm đang giảm giá") ?></h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-2 custom-dots">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section title -->

            <!-- Product Single -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <?= ProductSingle::widget(['product' => $topPro,'countDown' => true]) ?>

            </div>
            <!-- /Product Single -->

            <!-- Product Slick -->
            <div class="col-md-9 col-sm-6 col-xs-6">
                <div class="row">
                    <div id="product-slick-2" class="product-slick">
                        <?php foreach ($product_hot_sale as $topsale){?>
                            <?= ProductSingle::widget(['product' => $topsale,'countDown' => false]) ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- /Product Slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section section-grey">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <?php foreach ($image_block3_2 as $key => $imgB){
                if($key > 2){break;}
                ?>
                <!-- banner -->
                <div class="<?= $key == 0 ? 'col-md-8 col-xs-12' : 'col-md-4 col-sm-6 col-xs-6' ?>">
                    <a class="banner banner-1" href="<?= $imgB->link_page ?>">
                        <img src="<?= $imgB->url ?>" style="height: <?= $key == 0 ? '550px' : '260px' ?>" alt="<?= $imgB->description ?>">
                        <div class="banner-caption text-center">
                            <h2 class="white-color"><?= $imgB->title ?></h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->
            <?php } ?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row row-eq-height">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title"><?= LanguageHelpers::loadLanguage("deal-top-hot","Top sản phẩm đang được ưa chuộng") ?></h2>
                </div>
            </div>
            <!-- section title -->
            <?php foreach ($product_hot as $product){ ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <?= ProductSingle::widget(['product' => $product,'countDown' => false]) ?>
                </div>
            <?php } ?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
<!-- Button trigger modal -->
<!-- Modal -->