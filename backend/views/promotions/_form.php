<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\Promotions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promotions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discountType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'discountCalculateType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discountPercentage')->textInput() ?>

    <?= $form->field($model, 'discountAmount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'refundBinCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createTime')->textInput() ?>

    <?= $form->field($model, 'createUserId')->textInput() ?>

    <?= $form->field($model, 'conditionStartTime')->textInput() ?>

    <?= $form->field($model, 'conditionEndTime')->textInput() ?>

    <?= $form->field($model, 'conditionLimitUsageCount')->textInput() ?>

    <?= $form->field($model, 'conditionLimitUsageAmount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conditionLimitByCustomerUsageCount')->textInput() ?>

    <?= $form->field($model, 'conditionLimitByCustomerUsageAmount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conditionCategoryAlias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conditionCustomerEmails')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'conditionOrderMaxAmount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conditionOrderMinAmount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'couponCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usedOrderCountTotal')->textInput() ?>

    <?= $form->field($model, 'usedDiscountAmountTotal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usedFirstTime')->textInput() ?>

    <?= $form->field($model, 'usedLastTime')->textInput() ?>

    <?= $form->field($model, 'ListEmail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'conditionCheckService')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discountMaxAmount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checkInstalment')->textInput() ?>

    <?= $form->field($model, 'allowMultiplePromotion')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
