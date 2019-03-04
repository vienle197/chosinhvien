<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 04/03/2019
 * Time: 16:44
 */

use common\components\LanguageHelpers;
/**
 * @var \common\models\db\Cart[] $carts
 * @var \common\models\db\Address[] $address
 */
$final_amount = 0;
$default_city = 0;
?>
<div class="row" >
    <div class="col-lg-offset-1 col-lg-10" style="padding-top: 3%">
        <?php if(Yii::$app->user->isGuest){?>
            <div class="header-cart">
                <h4><?= LanguageHelpers::loadLanguage('login_to_cart',"Vui lòng đăng nhập để xem giỏ hàng của bạn") ?></h4>
            </div>
            <div>
                <button onclick="$('#login').modal('show');" class="main-btn icon-btn" style="padding: 0px 10px; width: max-content"><?= LanguageHelpers::loadLanguage('login_now',"Đăng nhập ngay") ?></button>
            </div>
        <?php }else{?>
            <div class="header-cart">
                <h4><?= LanguageHelpers::loadLanguage('header_checkout',"Thông tin đặt hàng") ?></h4>
            </div>
            <td>
                <?php if(!$carts){?>
                    <div class="">
                        <h4><?= LanguageHelpers::loadLanguage('cart_empty',"Giỏ hàng của bạn không có gì! Đi mua thôi nào.") ?></h4>
                    </div>
                <?php }else{?>
                    <button class="main-btn icon-btn" style="padding: 0px 10px; width: max-content" onclick="$('#popupAddress').modal()">
                        <i class="fa fa-plus"></i>
                        <?= LanguageHelpers::loadLanguage('add_address','Thêm địa chỉ') ?>
                    </button>
                    <?php if($address) {
                        echo "<table class='table'>";
                        foreach ($address as $value){
                            $default_city = $value->is_default ? $value->city_id : $default_city;
                        ?>
                            <tr>
                                <td>
                                    <input type="radio" name="address_id" <?= $value->is_default == 1 ? 'checked' : '' ?> value="<?= $value->id ?>" >
                                    <input type="hidden" id="city_id_<?= $value->id ?>" value="<?= $value->city_id ?>" >
                                </td>
                                <td>
                                    <div><?= $value->first_name ?> <?= $value->last_name ?>,</div>
                                    <div><?= $value->phone ?> - <?= $value->email ?>,</div>
                                    <div><?= $value->address ?>,</div>
                                    <div><?= $value->ward->wards_name ?>,<?= $value->district->district_name ?>,<?= $value->city->city_name ?>.</div>
                                </td>
                            </tr>
                    <?php
                        }
                        echo "</table>";
                    }
                    ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Thông tin sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($carts as $k => $cart){
                            $final_amount += floatval($cart->final_price_amount);
                            ?>
                            <tr id="product_<?= $cart->product->id ?>">
                                <td><?= $k+1 ?></td>
                                <td>
                                    <div>
                                        <img src="<?= $cart->product->image ?>" class="img-responsive"  style="width: 10%;margin-right:3%;float: left">
                                        <?= $cart->product->name ?><br>
                                    </div>
                                </td>
                                <td>
                                    <?= $cart->quantity ?>
                                </td>
                                <td>
                                    <div>
                                        <?= LanguageHelpers::showMoney($cart->product->sale_price && $cart->product->expired_time_sale_price > time() ? $cart->product->sale_price : $cart->product->price)?>
                                        <del><?= $cart->product->sale_price && $cart->product->expired_time_sale_price > time() ? LanguageHelpers::showMoney($cart->product->price) : "" ?></del>
                                    </div>
                                    <div>
                                        * <span id="quantity_span"><?= $cart->quantity ?></span>.<br>
                                        = <span id="final_total_amount"><?= LanguageHelpers::showMoney($cart->final_price_amount) ?></span>
                                    </div>
                                </td>
                            </tr>
                        <?php }?>
                        <tr>
                            <input type="hidden" id="total_amount" value="<?= $final_amount ?>" >
                            <td colspan="3"></td>
                            <td>
                                <table>
                                    <tr>
                                        <td><h6><?= LanguageHelpers::loadLanguage('shipping_fee','Phí vận chuyển') ?>: </h6></td>
                                        <td> <h6><span id="shippingfee"><?= LanguageHelpers::showMoney($default_city == 1 ? 0 : 20000) ?></span></h6></td>
                                    </tr>
                                    <tr>
                                        <td><h5><?= LanguageHelpers::loadLanguage('total_price_title','Tổng tiền') ?>: </h5></td>
                                        <td> <h5><span id="total_final_amount"><?= LanguageHelpers::showMoney($default_city == 1 ? $final_amount : 20000 + $final_amount) ?></span></h5></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="product-btns">
                                                <button class="primary-btn add-to-cart" onclick="createOrder()">
                                                    <i class="fa fa-credit-card"></i>
                                                    <?= LanguageHelpers::loadLanguage('checkout_now','Đặt hàng ngay') ?>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php }?>
            </div>
        <?php  }?>
    </div>
</div>
<div class="modal fade " id="popupAddress" tabindex="-1" role="dialog" aria-labelledby="popupAddress" aria-hidden="true">
    <div class="modal-dialog" role="form">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><?= LanguageHelpers::loadLanguage("add_address",'Thêm địa chỉ') ?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="padding: 10px;">
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('first-name','Tên') ?></label>
                        <span class="">
                            <input name="first_name_address" type="text" id="first_name_address" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('first-name','Tên') ?>">
                        </span>
                    </div>
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('last_name','Họ') ?></label>
                        <span class="">
                            <input name="last_name_address" type="text" id="last_name_address" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('last_name','Họ') ?>">
                        </span>
                    </div>
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('email','Email') ?></label>
                        <span class="">
                            <input name="email_address" type="text" id="email_address" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('email','email') ?>">
                        </span>
                    </div>
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('phone','Số điện thoại') ?></label>
                        <span class="">
                            <input name="phone_address" type="text" id="phone_address" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('phone','Số điện thoại') ?>">
                        </span>
                    </div>
                    <div class="form-group">
                        <div class="row" >
                            <div class="col-lg-4">
                                <label><?= LanguageHelpers::loadLanguage('city','Thành phố') ?></label>
                                <select id="city_id" class="form-control">
                                    <option value="0">-- Chọn thành phố</option>
                                    <?php foreach ($city as $value) {?>
                                        <option value="<?= $value['id'] ?>"><?= $value['city_name']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label><?= LanguageHelpers::loadLanguage('district','Quận huyện') ?></label>
                                <select id="district_id" class="form-control">
                                    <option value="0">-- Chọn quận huyện</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label><?= LanguageHelpers::loadLanguage('ward','Phường xã') ?></label>
                                <select id="ward_id" class="form-control">
                                    <option value="0">-- Chọn phường xã</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?= LanguageHelpers::loadLanguage('address','Địa chỉ') ?></label>
                        <span class="">
                            <input name="address" type="text" id="address" class="form-control" placeholder="<?= LanguageHelpers::loadLanguage('address','Địa chỉ') ?>">
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="">
                            <input name="is_default" <?= count($address) == 0 ? 'checked' : ''?> type="checkbox" id="is_default">
                                           <label><?= LanguageHelpers::loadLanguage('is_default_address','Đặt làm địa chỉ mặc định') ?></label>
                         </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="product-btns">
                    <button class="main-btn" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                        <?= LanguageHelpers::loadLanguage('cancel','Hủy bỏ') ?>
                    </button>
                    <button class="primary-btn add-to-cart" onclick="addAddress()">
                        <i class="fa fa-save"></i>
                        <?= LanguageHelpers::loadLanguage('save','Lưu lại') ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var districts = <?= json_encode((array)$district) ?>;
    var wards = <?= json_encode((array)$ward) ?>;

</script>