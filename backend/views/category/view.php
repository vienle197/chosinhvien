<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Category */
?>
<div class="category-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'origin_name',
            'parent_id',
            'description',
            'active',
            'meta_keywords',
            'meta_description',
            'meta_title',
        ],
    ]) ?>

</div>
