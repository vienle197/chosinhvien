<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\components\LanguageHelpers;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<?php $this->beginBody() ?>
<?php
 echo \frontend\views\widgets\Header::widget();
 echo \frontend\views\widgets\Nav::widget();
  ?>
<?= $content ?>
<?php include 'footer.php' ?>
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
                    <button class="primary-btn add-to-cart" onclick="addtocart('buynow')"><i class="fa fa-shopping-cart"></i> <?= LanguageHelpers::loadLanguage("add-to-cart","Cho vào giỏ") ?></button>
                    <button class="primary-btn add-to-cart" onclick="addtocart('cart')" style="background: green"><i class="fa fa-shopping-cart"></i> <?= LanguageHelpers::loadLanguage("buy-now","Mua ngay") ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="popupNotify" tabindex="-1" role="dialog" aria-labelledby="popupNotify" aria-hidden="true">
    <div class="modal-dialog" role="form">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="titlePopup"><?= LanguageHelpers::loadLanguage("login",'Đăng nhập') ?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="padding: 10px;">
                    <h5 id="contentPopup"></h5>
                </div>
            </div>
            <div class="modal-footer">
                <div class="product-btns">
                    <button class="main-btn icon-btn" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="loading" style="display:none">
    <div class="loading-inner">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="50" width="50" viewBox="0 0 75 75">
            <circle cx="37.5" cy="37.5" r="33.5" stroke-width="8"></circle>
        </svg>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
