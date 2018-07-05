<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Products */
?>
<div class="products-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'Sku',
            'CategoryId',
            'ManufacturerId',
            'MerchantId',
            'MetaKeywords',
            'MetaDescription',
            'MetaTitle',
            'StockQuantity',
            'AvailableStockQuantity',
            'OrderMinimumQuantity',
            'OrderMaximumQuantity',
            'DisableBuyButton',
            'AvailableForPreOrder',
            'Price',
            'SalePrice',
            'DateEndSale',
            'Deleted',
            'CreatedTime',
            'UpdatedTime',
            'Description:ntext',
        ],
    ]) ?>

</div>
