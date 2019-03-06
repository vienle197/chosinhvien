<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Merchant */
?>
<div class="merchant-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'note',
            'active',
        ],
    ]) ?>

</div>
