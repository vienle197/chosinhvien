<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Product */
?>
<div class="product-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'sku',
            'category_id',
            'parent_sku',
            'manufacturer_id',
            'merchant_id',
            'stock_quantity',
            'sold_quantity',
            'min_quantity',
            'max_quantity',
            'disable_buy_now',
            'disable_add_to_card',
            'is_pre_order',
            'price',
            'sale_price',
            'expired_time_sale_price:datetime',
            'active',
            'meta_keywords',
            'meta_description',
            'meta_title',
            'image',
            'sale_percent',
            'description:ntext',
        ],
    ]) ?>

</div>
