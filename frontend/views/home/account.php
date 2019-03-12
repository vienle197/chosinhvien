<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 06/03/2019
 * Time: 20:33
 */

use common\components\LanguageHelpers;
use common\models\db\Customer;

/**
 * @var Customer $customer
 * @var \common\models\db\Address[] $list_address
 */
?>

<div class="content row col-lg-offset-1 col-lg-11" style="padding-top: 3%">
    <h4><?= LanguageHelpers::loadLanguage('your_account', 'Tài khoản của bạn') ?></h4>
    <div class="row">
        <div class="col-lg-4" id="info_account">
            <div class="form-group">
                <label onclick="edit_account()" style="cursor: pointer;" ><i class="fa fa-edit"></i><?= LanguageHelpers::loadLanguage('edit', 'Chỉnh sửa') ?></label>
            </div>
            <div class="form-group">
                <label><?= LanguageHelpers::loadLanguage('first-name', 'Tên') ?></label>
                <span class="">
                            <input name="first_name_edit" type="text" disabled id="first_name_edit"
                                   value="<?= $customer->first_name ?>" class="form-control"
                                   placeholder="<?= LanguageHelpers::loadLanguage('first-name', 'Tên') ?>">
                        </span>
            </div>
            <div class="form-group">
                <label><?= LanguageHelpers::loadLanguage('last_name', 'Họ') ?></label>
                <span class="">
                            <input name="last_name_edit" type="text" disabled id="last_name_edit"
                                   value="<?= $customer->last_name ?>" class="form-control"
                                   placeholder="<?= LanguageHelpers::loadLanguage('last_name', 'Họ') ?>">
                        </span>
            </div>
            <div class="form-group">
                <label><?= LanguageHelpers::loadLanguage('email', 'Email') ?></label>
                <span class="">
                            <input name="email_edit" type="text" disabled id="email_edit"
                                   value="<?= $customer->email ?>" class="form-control"
                                   placeholder="<?= LanguageHelpers::loadLanguage('email', 'email') ?>">
                        </span>
            </div>
            <div class="form-group">
                <label><?= LanguageHelpers::loadLanguage('phone', 'Số điện thoại') ?></label>
                <span class="">
                            <input name="phone_edit" type="text" id="phone_edit" value="<?= $customer->phone ?>"
                                   disabled class="form-control"
                                   placeholder="<?= LanguageHelpers::loadLanguage('phone', 'Số điện thoại') ?>">
                        </span>
            </div>
            <div class="form-group">
                <label><?= LanguageHelpers::loadLanguage('password', 'Mật khẩu') ?></label>
                <div class="data_temp" onclick="editPass()" >************ <i class="fa fa-edit"></i></div>
                <span class="">
                            <input name="password_edit" type="hidden" id="password_edit" class="form-control"
                                   placeholder="<?= LanguageHelpers::loadLanguage('password', 'Tên đăng nhập') ?>">
                        </span>
            </div>
            <div class="form-group" id="re_pass_group" style="display: none" >
                <label><?= LanguageHelpers::loadLanguage('re_password', 'Nhập lại mật khẩu') ?></label>
                <span class="">
                            <input name="re_password_edit" type="password" id="re_password_edit"
                                   class="form-control"
                                   placeholder="<?= LanguageHelpers::loadLanguage('re_password', 'Nhập lại mật khẩu') ?>">
                        </span>
            </div>
            <div class="form-group">
                <label><?= LanguageHelpers::loadLanguage('last_order_at', 'Đơn hàng gần đây') ?></label>
                <span class="">
                            <?= $customer->last_order_at ? date("h:i d-m;Y",$customer->last_order_at): "---" ?>
                        </span>
            </div>
            <div class="form-group" id="group_btn" style="display: none">
                <div class="product-btns">
                    <button class="main-btn" onclick="hide_edit()" ><i class="fa fa-close"></i><?= LanguageHelpers::loadLanguage('cancel','Hủy bỏ') ?></button>
                    <button id="btn_save" class="primary-btn add-to-cart" onclick="save_edit()" ><i class="fa fa-close"></i><?= LanguageHelpers::loadLanguage('save','Lưu lại') ?></button>
                    <button id="btn_save_pass" class="primary-btn add-to-cart" style="display: none;" onclick="save_edit()" ><i class="fa fa-close"></i><?= LanguageHelpers::loadLanguage('save_pass','Thay Đổi Mật Khẩu') ?></button>
                </div>
            </div>
            <div class="form-group" id="group_btn_pass" style="display: none">
                <div class="product-btns">
                    <button class="main-btn" onclick="hide_edit_pass()" ><i class="fa fa-close"></i><?= LanguageHelpers::loadLanguage('cancel','Hủy bỏ') ?></button>
                    <button id="btn_save_pass" class="primary-btn add-to-cart" onclick="save_edit()" ><i class="fa fa-close"></i><?= LanguageHelpers::loadLanguage('save_pass','Thay Đổi Mật Khẩu') ?></button>
                </div>
            </div>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>
