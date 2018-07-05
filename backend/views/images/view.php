<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Images */
?>
<div class="images-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'url:ntext',
            'productId',
            'categoryId',
            'blockId',
        ],
    ]) ?>

</div>
