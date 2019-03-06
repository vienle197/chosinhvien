<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'parent_sku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manufacturer_id')->textInput() ?>

    <?= $form->field($model, 'merchant_id')->textInput() ?>

    <?= $form->field($model, 'stock_quantity')->textInput() ?>

    <?= $form->field($model, 'sold_quantity')->textInput() ?>

    <?= $form->field($model, 'min_quantity')->textInput() ?>

    <?= $form->field($model, 'max_quantity')->textInput() ?>

    <?= $form->field($model, 'disable_buy_now')->textInput() ?>

    <?= $form->field($model, 'disable_add_to_card')->textInput() ?>

    <?= $form->field($model, 'is_pre_order')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sale_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expired_time_sale_price')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sale_percent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
