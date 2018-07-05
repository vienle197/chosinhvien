<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Promotions */
?>
<div class="promotions-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
            'message',
            'discountType',
            'status',
            'discountCalculateType',
            'discountPercentage',
            'discountAmount',
            'refundBinCode',
            'createTime',
            'createUserId',
            'conditionStartTime',
            'conditionEndTime',
            'conditionLimitUsageCount',
            'conditionLimitUsageAmount',
            'conditionLimitByCustomerUsageCount',
            'conditionLimitByCustomerUsageAmount',
            'conditionCategoryAlias',
            'conditionCustomerEmails:ntext',
            'conditionOrderMaxAmount',
            'conditionOrderMinAmount',
            'couponCode',
            'usedOrderCountTotal',
            'usedDiscountAmountTotal',
            'usedFirstTime',
            'usedLastTime',
            'ListEmail:ntext',
            'conditionCheckService',
            'discountMaxAmount',
            'checkInstalment',
            'allowMultiplePromotion',
        ],
    ]) ?>

</div>
