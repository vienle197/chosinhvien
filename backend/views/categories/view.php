<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Categories */
?>
<div class="categories-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'originName',
            'parentId',
            'description:ntext',
            'active',
            'MetaKeywords',
            'MetaDescription:ntext',
            'MetaTitle',
        ],
    ]) ?>

</div>
