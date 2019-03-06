<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Customer */
?>
<div class="customer-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'phone',
            'status',
            'last_order_at',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
