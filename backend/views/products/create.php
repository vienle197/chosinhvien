<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\Products */
/* @var $data */

?>
<div class="products-create">
    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
    ]) ?>
</div>
