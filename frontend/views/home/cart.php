<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 02/03/2019
 * Time: 10:02
 */

use common\components\LanguageHelpers;
/**
 * @var \common\models\db\Cart[] $carts
 * @var  $type
 */
?>
<div class="row" >
    <div class="col-lg-offset-1 col-lg-10" style="padding-top: 3%">
        <?php if(Yii::$app->user->isGuest){?>
            <div class="header-cart">
                <h4><?= LanguageHelpers::loadLanguage('login_to_cart',"Vui lòng đăng nhập để xem giỏ hàng của bạn") ?></h4>
            </div>
            <div>
                <button onclick="$('#login').modal('show');"><?= LanguageHelpers::loadLanguage('login_now',"Đăng nhập ngay") ?></button>
            </div>
        <?php }else{?>
            <div class="header-cart">
                <h4><?= LanguageHelpers::loadLanguage('header_cart',"Giỏ hàng của bạn") ?></h4>
            </div>
            <div>
                <?php if(!$carts){?>
                    <div class="">
                        <h4><?= LanguageHelpers::loadLanguage('cart_empty',"Giỏ hàng của bạn không có gì! Đi mua thôi nào.") ?></h4>
                    </div>
                <?php }else{?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th> </th>
                            <th>#</th>
                            <th>Thông tin sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($carts as $k => $cart){ ?>
                            <tr id="product_<?= $cart->product->id ?>">
                                <td><?= $k+1 ?></td>
                                <td><input type="checkbox" name="checkBoxItem" onchange="changeCart()" value="<?= $cart->product->id ?>" <?= $type == 'buynow' && $k > 0 ? '' : 'checked' ?>></td>
                                <td>
                                    <div>
                                        <img src="<?= $cart->product->image ?>" class="img-responsive"  style="width: 10%;margin-right:3%;float: left">
                                        <?= $cart->product->name ?><br>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn" onclick="changeQuantityInCart('-','<?= $cart->product->id ?>')"><i class="fa fa-chevron-left"></i></button>
                                    <input onchange="changeQuantityInCart(' ','<?= $cart->product->id ?>')" id="quantity_cart_<?= $cart->product->id ?>" type="number" value="<?= $cart->quantity ?>" class="btn btn-group-quantiy" width="15%" />
                                    <button class="btn"  onclick="changeQuantityInCart('+','<?= $cart->product->id ?>')" ><i class="fa fa-chevron-right"></i></button>
                                    <span>
                                        <?= $cart->product->type_quantity ? $cart->product->type_quantity : 'sản phẩm' ?>
                                    </span>
                                </td>
                                <td>
                                    <div>
                                        <?= LanguageHelpers::showMoney($cart->product->sale_price && $cart->product->expired_time_sale_price > time() ? $cart->product->sale_price : $cart->product->price)?>
                                        <del><?= $cart->product->sale_price && $cart->product->expired_time_sale_price > time() ? LanguageHelpers::showMoney($cart->product->price) : "" ?></del>
                                    </div>
                                    <div>
                                        * <span id="quantity_span"><?= $cart->quantity ?></span>.<br>
                                        = <span id="final_total_amount"><?= LanguageHelpers::showMoney($cart->final_price_amount) ?></span>
                                        <input id="total_price_<?= $cart->product->id ?>" value="<?= ($cart->final_price_amount) ?>" type="hidden">
                                    </div>
                                </td>
                                <td><button class="main-btn icon-btn" onclick="removeItemCart(<?= $cart->product->id ?>)" ><i class="fa fa-remove"></i></button></td>
                            </tr>
                        <?php }?>
                        <tr>
                            <td colspan="4"></td>
                            <td>
                                <h5><?= LanguageHelpers::loadLanguage('total_price_title','Tổng tiền') ?>: <span id="total_checkout"><?= LanguageHelpers::showMoney(0) ?></span></h5>
                                <div class="product-btns">
                                    <button class="primary-btn add-to-cart" onclick="checkout()">
                                        <?= LanguageHelpers::loadLanguage('checkouting','Tiến hành đặt hàng') ?>
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                <?php }?>
            </div>
        <?php  }?>
    </div>
</div>
