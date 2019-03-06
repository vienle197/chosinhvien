<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Language */
?>
<div class="language-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'language_code',
            'resource:ntext',
            'value:ntext',
            'active',
        ],
    ]) ?>

</div>
