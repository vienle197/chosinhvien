<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Image */
?>
<div class="image-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'url:url',
            'product_id',
            'category_id',
            'customer_id',
            'created_at',
            'updated_at',
            'active',
            'post_id',
            'type',
            'link_page',
            'title',
            'description',
        ],
    ]) ?>

</div>
