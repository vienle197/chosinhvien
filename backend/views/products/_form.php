<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Sku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProductName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CategoryId')->textInput() ?>

    <?= $form->field($model, 'ParentSKU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ManufacturerId')->textInput() ?>

    <?= $form->field($model, 'MerchantId')->textInput() ?>

    <?= $form->field($model, 'MetaKeywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StockQuantity')->textInput() ?>

    <?= $form->field($model, 'AvailableStockQuantity')->textInput() ?>

    <?= $form->field($model, 'OrderMinimumQuantity')->textInput() ?>

    <?= $form->field($model, 'OrderMaximumQuantity')->textInput() ?>

    <?= $form->field($model, 'DisableBuyButton')->textInput() ?>

    <?= $form->field($model, 'AvailableForPreOrder')->textInput() ?>

    <?= $form->field($model, 'Price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SalePrice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DateEndSale')->textInput() ?>

    <?= $form->field($model, 'Deleted')->textInput() ?>

    <?= $form->field($model, 'CreatedTime')->textInput() ?>

    <?= $form->field($model, 'UpdatedTime')->textInput() ?>

    <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'OptionVariations')->textarea(['rows' => 6]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
