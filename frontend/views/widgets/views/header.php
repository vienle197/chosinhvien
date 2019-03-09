<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 25/06/2018
 * Time: 11:01 PM
 */

/**
 * @var \common\models\db\Category[] $cateSearch
 * @var \common\models\db\Category[] $cates
 * @var \common\models\db\Product[] $product_hot
 * @var \common\models\db\Product[] $product_hot_sale
 */
use common\components\LanguageHelpers;
?>
<header>
    <!-- top Header -->
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span><?= LanguageHelpers::loadLanguage("Welcome-to","Chào mừng đến với") ?> <?= LanguageHelpers::loadLanguage("shop-name","E Shop") ?>!</span>
            </div>
            <div class="pull-right">
                <ul class="header-top-links">
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">VI <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">Tiếng Việt (vi-VN)</a></li>
                            <li><a href="#">English (en-US)</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="/">
                        <img src="<?= LanguageHelpers::loadLanguage('logo_img','/img/logo.png') ?>" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search">
                    <form action="/search.html" method="get">
                        <input class="input search-input" type="text" name="keyword" placeholder="Enter your keyword">
                        <select class="input search-categories" name="category_id">
                            <option value="0"><?= LanguageHelpers::loadLanguage('all_cate','Tất cả danh mục') ?></option>
                            <?php
                            foreach ($cateSearch as $category){
                                echo "<option value='$category->id'>$category->name</option>";
                            }
                            ?>
                        </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>
                            <strong class="text-uppercase"><?= Yii::$app->user->isGuest ? 'My Account' : Yii::$app->user->getIdentity()->first_name . " ". Yii::$app->user->getIdentity()->last_name ?> <i class="fa fa-caret-down"></i></strong>
                        </div>
                        <?php if(Yii::$app->user->isGuest) { ?>
                            <a href="javascript:void(0);" class="text-uppercase" onclick="$('#login').modal()">Login</a> / <a href="javascript:void(0);" onclick="$('#signUp').modal()" class="text-uppercase">Join</a>
                        <?php }else{?>
                            <span><?= LanguageHelpers::loadLanguage("Hello_account" , "Xin chào!") ?></span>
                            <ul class="custom-menu" style="display: <?= Yii::$app->user->isGuest ? 'none' : 'block' ?>">
                                <li><a href="/my-account.html"><i class="fa fa-user-o"></i><?= LanguageHelpers::loadLanguage("my_account" , "Tài khoản") ?></a></li>
                                <li><a href="/order.html"><i class="fa fa-first-order"></i><?= LanguageHelpers::loadLanguage("my_order" , "Đơn hàng!") ?></a></li>
                                <li><a href="javascript:void ();" onclick="logout()"><i class="fa fa-unlock-alt"></i> Log Out</a></li>
                            </ul>
                        <?php }?>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    <li class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" onclick="window.location.assign('/cart.html')" href="/cart.html">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty"><?= Yii::$app->session->get("quantity_cart",0) ?></span>
                            </div>
                            <strong class="text-uppercase">Giỏ hàng</strong>
                            <br>
<!--                            <span>35.20$</span>-->
                        </a>
<!--                        <div class="custom-menu">-->
<!--                            <div id="shopping-cart">-->
<!--                                <div class="shopping-cart-list">-->
<!--                                    <div class="product product-widget">-->
<!--                                        <div class="product-thumb">-->
<!--                                            <img src="/img/thumb-product01.jpg" alt="">-->
<!--                                        </div>-->
<!--                                        <div class="product-body">-->
<!--                                            <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>-->
<!--                                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>-->
<!--                                        </div>-->
<!--                                        <button class="cancel-btn"><i class="fa fa-trash"></i></button>-->
<!--                                    </div>-->
<!--                                    <div class="product product-widget">-->
<!--                                        <div class="product-thumb">-->
<!--                                            <img src="/img/thumb-product01.jpg" alt="">-->
<!--                                        </div>-->
<!--                                        <div class="product-body">-->
<!--                                            <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>-->
<!--                                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>-->
<!--                                        </div>-->
<!--                                        <button class="cancel-btn"><i class="fa fa-trash"></i></button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="shopping-cart-btns">-->
<!--                                    <button class="main-btn">View Cart</button>-->
<!--                                    <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                    </li>
                    <!-- /Cart -->

                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
<div class="modal fade " id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog" role="form">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><?= LanguageHelpers::loadLanguage("login",'Đăng nhập') ?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="padding: 10px;">
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('username','Tên đăng nhập') ?></label>
                        <span class="">
                            <input name="username" type="text" id="username" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('username','Tên đăng nhập') ?>">
                        </span>
                    </div>
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('password','Mật khẩu') ?></label>
                        <span class="">
                            <input name="password" type="password" id="password" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('username','Tên đăng nhập') ?>">
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="product-btns row">
                    <div class="col-lg-6">
                        <button class="btn btn-success" style="width: -webkit-fill-available" onclick="login()"><?= LanguageHelpers::loadLanguage("login",'Đăng nhập') ?></button>
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-warning" onclick="$('#login').modal('hide');$('#signUp').modal('show');" style="width: -webkit-fill-available"><?= LanguageHelpers::loadLanguage("signUp",'Đăng ký') ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="signUp" tabindex="-1" role="dialog" aria-labelledby="signUp" aria-hidden="true">
    <div class="modal-dialog" role="form">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><?= LanguageHelpers::loadLanguage("signUp",'Đăng ký') ?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="padding: 10px;">
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('first-name','Tên') ?></label>
                        <span class="">
                            <input name="first_name" type="text" id="first_name" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('first-name','Tên') ?>">
                        </span>
                    </div>
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('last_name','Họ') ?></label>
                        <span class="">
                            <input name="last_name" type="text" id="last_name" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('last_name','Họ') ?>">
                        </span>
                    </div>
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('email','Email') ?></label>
                        <span class="">
                            <input name="email" type="text" id="email" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('email','email') ?>">
                        </span>
                    </div>
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('phone','Số điện thoại') ?></label>
                        <span class="">
                            <input name="phone" type="text" id="phone" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('phone','Số điện thoại') ?>">
                        </span>
                    </div>
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('username','Tên đăng nhập') ?></label>
                        <span class="">
                            <input name="username_sigup" type="text" id="username_sigup" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('username','Tên đăng nhập') ?>">
                        </span>
                    </div>
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('password','Mật khẩu') ?></label>
                        <span class="">
                            <input name="password_signup" type="password" id="password_signup" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('password','Tên đăng nhập') ?>">
                        </span>
                    </div>
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('re_password','Nhập lại mật khẩu') ?></label>
                        <span class="">
                            <input name="re_password_signup" type="password" id="re_password_signup" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('re_password','Nhập lại mật khẩu') ?>">
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="product-btns row">
                    <div class="col-lg-12">
                        <?= LanguageHelpers::loadLanguage("you_have_account",'Bạn đã có tài khoản?') ?>
                        <a href="javascript:void (0);" style="text-decoration:underline;" onclick="$('#signUp').modal('hide');$('#login').modal('show');" ><?= LanguageHelpers::loadLanguage("login_now",'Đăng nhập ngay.') ?></a>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-success" style="width: -webkit-fill-available" onclick="signUp()"><?= LanguageHelpers::loadLanguage("signUp",'Đăng ký') ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>