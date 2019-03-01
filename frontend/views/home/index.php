<?php
use common\components\LanguageHelpers;
use frontend\views\widgets\ProductSingle;

/**
 * @var \common\models\db\Category[] $cateSearch
 * @var \common\models\db\Category[] $cates
 * @var \common\models\db\Product[] $product_hot
 * @var \common\models\db\Product[] $product_hot_sale
 */

$topPro = $product_hot_sale[0];
unset($product_hot_sale[0]);
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
                <!-- banner -->
                <div class="banner banner-1">
                    <img src="/img/banner01.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h1>Bags sale</h1>
                        <h3 class="white-color font-weak">Up to 50% Discount</h3>
                        <button class="primary-btn">Shop Now</button>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="banner banner-1">
                    <img src="/img/banner02.jpg" alt="">
                    <div class="banner-caption">
                        <h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
                        <button class="primary-btn">Shop Now</button>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="banner banner-1">
                    <img src="/img/banner03.jpg" alt="">
                    <div class="banner-caption">
                        <h1 class="white-color">New Product <span>Collection</span></h1>
                        <button class="primary-btn">Shop Now</button>
                    </div>
                </div>
                <!-- /banner -->
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
            <!-- banner -->
            <div class="col-md-4 col-sm-6">
                <a class="banner banner-1" href="#">
                    <img src="/img/banner10.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h2 class="white-color">NEW COLLECTION</h2>
                    </div>
                </a>
            </div>
            <!-- /banner -->

            <!-- banner -->
            <div class="col-md-4 col-sm-6">
                <a class="banner banner-1" href="#">
                    <img src="/img/banner11.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h2 class="white-color">NEW COLLECTION</h2>
                    </div>
                </a>
            </div>
            <!-- /banner -->

            <!-- banner -->
            <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                <a class="banner banner-1" href="#">
                    <img src="/img/banner12.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h2 class="white-color">NEW COLLECTION</h2>
                    </div>
                </a>
            </div>
            <!-- /banner -->

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
            <!-- banner -->
            <div class="col-md-8">
                <div class="banner banner-1">
                    <img src="/img/banner13.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
                        <button class="primary-btn">Shop Now</button>
                    </div>
                </div>
            </div>
            <!-- /banner -->

            <!-- banner -->
            <div class="col-md-4 col-sm-6">
                <a class="banner banner-1" href="#">
                    <img src="/img/banner11.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h2 class="white-color">NEW COLLECTION</h2>
                    </div>
                </a>
            </div>
            <!-- /banner -->

            <!-- banner -->
            <div class="col-md-4 col-sm-6">
                <a class="banner banner-1" href="#">
                    <img src="/img/banner12.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h2 class="white-color">NEW COLLECTION</h2>
                    </div>
                </a>
            </div>
            <!-- /banner -->
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
<div class="modal fade " id="detailModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><?= LanguageHelpers::loadLanguage("title-popup-detail",'Chi tiết sản phẩm') ?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_body_detail">
                <div class="product row">
                    <div class="col-md-4">
                        <div class="img-thumbnail">
                            <img src="https://lorempixel.com/270/360/">
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-7">
                        <h3>Tên sản phẩm</h3>
                        <hr>
                        <div style="padding-bottom: 5px" >
                            <span class="content-infor-product" style="padding-left: 0px">Người bán: <a style="cursor: pointer" id="merchant">ABC</a></span><span class="content-infor-product">Nhà sản xuất <a style="cursor: pointer" id="manufacturer">XYZ</a></span><span class="content-infor-product" style="border-right: none">60 đơn đã được mua</span>
                        </div>
                        <h3 class="product-price" style="margin-bottom: 20px;padding: 20px; background: #d6d1d1">đ4 000 000 <del class="product-old-price">đ3 000 000</del> <span class="product-old-price" >31% GIẢM</span></h3>
                        <div class="row title-variation">
                            <div class="col-lg-4">
                                Màu sắc:
                            </div>
                            <div class="col-lg-8 row">
                                <button class="btn btn-default">đỏ</button>
                                <button class="btn btn-default">hồng</button>
                                <button class="btn btn-default">xanh</button>
                                <button class="btn btn-default">vàng</button>
                                <button class="btn btn-default">tím</button>
                                <button class="btn btn-default">trắng</button>
                                <button class="btn btn-default">trắng</button>
                                <button class="btn btn-default">trắng</button>
                                <button class="btn btn-default">trắng</button>
                                <button class="btn btn-default">trắng</button>
                                <button class="btn btn-default">đen</button>
                                <button class="btn btn-default">đen</button>
                                <button class="btn btn-default">đen</button>
                                <button class="btn btn-default">đen</button>
                            </div>
                        </div>
                        <div class="row title-variation">
                            <div class="col-lg-3">
                                Số lượng:
                            </div>
                            <div class="col-lg-9">
                                <span><i class="fa fa-chevron-left"></i></span><input type="text" width="15%" /><span></span><span><i class="fa fa-chevron-left"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding-top: 15px">
                        <h3 class="title-detail-product">Mô tả sản phẩm</h3>
                        <div class="description">
                            Bảo hành 1 tháng bằng tem dán trên micro. 1 đổi 1 trong 1 tuần đầu nếu lỗi kĩ thuật (Quý khách vui lòng bảo quản micro và phụ kiện để được đổi mới).

                            Micro không dây Daile V12 là một sản phẩm được kế thừa nhiều tính năng nổi bật của chiếc micro Daile V10 nhỏ gọn, tiện lợi cho khả năng chống nhiễu cao, khoảng cách hoạt động xa rộng, thoải mái ca hát với khả năng hút âm tốt, chống ồn, chống nhiễu cao.
                            Đặc điểm nổi bật của micro không dây DAILE V12 hát karaoke giá rẻ- Micro không dây Daile V12 kết nối sử dụng đơn giản, nhanh chóng
                            - Khả năng tương thích tốt với mọi thiết bị hát karaoke tốt
                            - Dalie V12 được trang bị màn hình LCD hiện thị thông số nhanh, hiện đại
                            - Mic Daile V12 cho chất lượng âm thanh trung thực, trong trẻ khi sử dụng hát karaoke
                            - Micro không dây Daile V12 sử dụng 2 viên pin 2A tiện lợi, thay dễ dàng, nhanh chóng
                            Hướng dẫn sử dụng micro không dây DAILE V12 nhanh chóng, đơn giản
                            - Cắm USB thu vào cổng USB của loa, amply, tivi,..để cấp nguồn điện cho thiết bị
                            Hướng dẫn sử dụng micro không dây DAILE V12 nhanh chóng, đơn giản
                            - Cắm USB thu vào cổng USB của loa, amply, tivi,..để cấp nguồn điện cho thiết bị
                            - Nối dây 3.5mm vào USB và cục chuyển 6.5mm vào ngõ mic trên loa/amply là sử dụng được
                            Bộ sản phẩm bao gồm:
                            Micro Daile V12
                            Dây 2 đầu 3.5mm
                            Cục chuyển 6.5mm
                            Usb thu sóng
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="product-btns">
                    <button class="main-btn icon-btn" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> <?= LanguageHelpers::loadLanguage("add-to-cart","Cho vào giỏ") ?></button>
                    <button class="primary-btn add-to-cart" style="background: green"><i class="fa fa-shopping-cart"></i> <?= LanguageHelpers::loadLanguage("buy-now","Mua ngay") ?></button>
                </div>
            </div>
        </div>
    </div>
</div>