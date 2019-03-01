<?php
/**
 *
 * Created by PhpStorm.
 * User: galat
 * Date: 28/02/2019
 * Time: 21:44
 */

use common\components\LanguageHelpers;
use common\models\db\Product;
/**
 *@var Product $product
 *@var $countDown
 */
?>

<div class="product product-single <?= $countDown?"product-hot" : "" ?>">
    <div class="product-thumb">
        <div class="product-label">
            <?= $product->expired_time_sale_price > time() ? '<span class="sale">-' .$product->sale_percent .'%</span>': "" ?>
        </div>
        <?php if($countDown) {?>
        <ul class="product-countdown" id="countdown">
            <li><span id="countdownD">00 D</span></li>
            <li><span id="countdownH">00 H</span></li>
            <li><span id="countdownM">00 M</span></li>
            <li><span id="countdownS">00 S</span></li>
        </ul>
        <?php } ?>
        <button class="main-btn quick-view" onclick="viewDetail(<?= $product->id ?>,'<?= $product->parent_sku ?>')" ><i class="fa fa-search-plus"></i> <?= LanguageHelpers::loadLanguage('view-detail','Xem chi tiết') ?></button>
        <img src="<?= $product->image ?>" alt="">
    </div>
    <div class="product-body row">
        <div class="col-md-8" >
            <h4 class="product-price"><?= LanguageHelpers::showMoney($product->sale_price ? $product->sale_price : $product->price )?><br><del class="product-old-price"><?= LanguageHelpers::showMoney($product->price )?></del></h4>
        </div>
        <div class="col-md-4" >
            <div class="btn btn-default">
                <i class="fa fa-shopping-cart" ></i>
                <?= $product->sold_quantity ?>
            </div>
        </div>
        <div class="col-md-12" >
            <h2 class="product-name"><a href="#"><?= $product->name ?></a></h2>
        </div>
        <div class="col-md-12" >
            <div class="product-btns">
<!--                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>-->
<!--                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> --><?//= LanguageHelpers::loadLanguage("add-to-cart","Cho vào giỏ") ?><!--</button>-->
<!--                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> --><?//= LanguageHelpers::loadLanguage("buy-now","Mua ngay") ?><!--</button>-->
            </div>
        </div>
    </div>
</div>
