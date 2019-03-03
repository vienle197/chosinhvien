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
                <?php if(Yii::$app->user->isGuest){?>
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
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($carts as $k => $cart){ ?>
                            <tr>
                                <td><?= $k+1 ?></td>
                                <td><input type="checkbox"></td>
                                <td>
                                    <div>
                                        <img src="<?= $cart->product->image ?>" class="img-circle" style="float: left">
                                        <?= $cart->product->name ?><br>
                                    </div>
                                </td>
                                <td><input id="quantity_cart_<?= $k+1 ?>" type="number" value="<?= $cart->quantity ?>"></td>
                                <td>
                                    <div>
                                        <?= LanguageHelpers::showMoney($cart->product->sale_price && $cart->product->expired_time_sale_price > time() ? $cart->product->sale_price : $cart->product->price)?>
                                        <del><?= $cart->product->sale_price && $cart->product->expired_time_sale_price > time() ? LanguageHelpers::showMoney($cart->product->price) : "" ?></del>
                                    </div>
                                    <div>
                                        * <?= $cart->quantity ?>.<br>
                                        = <?= $cart->final_price_amount ?>
                                    </div>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                <?php }?>
            </div>
        <?php  }?>
    </div>
</div>
