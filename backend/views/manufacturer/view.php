<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Manufacturer */
?>
<div class="manufacturer-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ManufacturerName',
            'Note',
            'active',
        ],
    ]) ?>

</div>
