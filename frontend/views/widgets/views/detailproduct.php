<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 01/03/2019
 * Time: 10:26
 */

/**
 * @var \common\models\db\Product $product
 * @var \common\models\db\Product $product_child
 * @var array $variations
 */

use common\components\LanguageHelpers;
?>
<div class="product row">
    <div class="col-md-4">
        <div class="img-thumbnail">
            <img src="<?= $product_child->image ?>">
        </div>
    </div>
    <div class="col-md-offset-1 col-md-7">
        <h3><?= $product_child->name ? $product_child->name : $product->name ?></h3>
        <hr>
        <div style="padding-bottom: 5px" >
            <span class="content-infor-product" style="padding-left: 0px">Người bán: <a style="cursor: pointer" id="merchant"><?= $product_child->merchant->name ? $product_child->merchant->name : $product->merchant->name ?></a></span><span class="content-infor-product"><?= $product_child->sold_quantity ? $product_child->sold_quantity : $product->sold_quantity ?> đơn đã được mua</span>
            <br><span class="content-infor-product" style="padding-left: 0px">Nhà sản xuất <a style="cursor: pointer" id="manufacturer"><?= $product_child->manufacturer->name ? $product_child->manufacturer->name : $product->manufacturer->name ?></a></span>
        </div>
        <h3 class="product-price" style="margin-bottom: 20px;padding: 20px; background: #d6d1d1"><?= LanguageHelpers::showMoney($product_child->sale_price && $product_child->expired_time_sale_price > time() ? $product_child->sale_price : $product->price) ?> <del class="product-old-price"><?= $product_child->expired_time_sale_price>time() ?LanguageHelpers::showMoney($product_child->price):"" ?></del> <span class="product-old-price" ><?= $product_child->sale_percent && $product_child->expired_time_sale_price > time() ? " -".$product_child->sale_percent."% GIẢM" : "" ?></span></h3>
        <div class="row title-variation">
            <?php foreach ($variations as $key => $values) {?>
                <div class="col-lg-4">
                    <?= $key ?>:
                </div>
                <div class="col-lg-8 row">
                    <?php foreach ($values as $value) {
                       echo '<button class="btn btn-default">'.$value.'</button>';
                    }?>
                </div>
            <?php }?>
        </div>
        <div class="row title-variation">
            <div class="col-lg-3">
                Số lượng:
            </div>
            <div class="col-lg-9">
                <span><i class="fa fa-chevron-left"></i></span><input type="text" width="15%" /><span></span><span><i class="fa fa-chevron-right"></i></span><span> <?= $product_child->stock_quantity ?> sản phẩm có thể mua</span>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="padding-top: 15px">
        <h3 class="title-detail-product">Mô tả sản phẩm</h3>
        <div class="description">
            <?= $product_child->description ?>
        </div>
    </div>
</div>
