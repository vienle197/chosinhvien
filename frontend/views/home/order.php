<?php

use common\components\LanguageHelpers;
use common\models\Order;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $data \common\models\db\Order[] */

$this->title = LanguageHelpers::loadLanguage("order",'Đơn hàng');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content row col-lg-offset-1 col-lg-11" style="padding-top: 3%">
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <table class="table">
            <tbody>
            <?php foreach ($data as $datum) {?>
                <tr>
                    <td>
                        <strong>ORDER-<?= $datum->id ?></strong><br>
                        <div><span><i class="fa fa-user"></i> <?= $datum->last_name ?> <?= $datum->first_name ?></span></div>
                        <div><span><i class="fa fa-envelope"></i> <?= $datum->email ?></span></div>
                        <div><span><i class="fa fa-phone"></i> <?= $datum->phone ?></span></div>
                        <div><span><i class="fa fa-calendar"></i> <?= date('H:i d-m-Y',$datum->created_at) ?></span></div>
                    </td>
                    <td>
                        <?php foreach ($datum->orderItems as $orderItem) { ?>
                            <div class="row col-lg-12" >
                                <div class="col-lg-1" ><div style="width: 60px;height: 60px;" ><img class="img-responsive" src="<?= Yii::$app->params['url_frontend'].$orderItem->product->image ?>"></div>  </div>
                                <div class="col-lg-offset-1 col-lg-10" >
                                    <strong><?= $orderItem->product->name ?></strong><br>
                                    Số lượng: <span><?= $orderItem->quantity ?></span> | Tổng Giá: <span><?= LanguageHelpers::showMoney($orderItem->final_price_amount) ?></span> <br>
                                    Hãng sản xuất: <span><?= $orderItem->product->manufacturer->name ?></span> <br>
                                </div>
                            </div>
                        <?php }?>
                    </td>
                    <td><div class="label label-<?= \common\components\TextUtility::getClassStatus($datum->status) ?>">
                            <?= $datum->status ?>
                        </div>
                        <div class="hljs-date">
                                <?= date('H:i d-m-Y',$datum->updated_at) ?>
                            </div>
                    </td>
                    <td>
                        <?php if ($datum->status == Order::STATUS_NEW){?>
                            <div class="product-btns">
                                <button class="main-btn" onclick="updateOrder(<?= $datum->id ?>,'<?= Order::STATUS_CANCEL ?>')">
                                    <?= LanguageHelpers::loadLanguage('cancel','Hủy') ?>
                                    <i class="fa fa-close"></i>
                                </button>
                            </div>
                        <?php }?>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>

</div>
</div>