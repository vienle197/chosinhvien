<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\db\Products */
/* @var $form yii\widgets\ActiveForm */
$data = ['1' => '123',
    '2' => 'asd',
    '3' => 'mmmm',
    '4' => 'vienle',
    '5' => 'nhungvu',
    '6' => 'test',
    '7' => 'desc',
    '8' => 'asc',
    '9' => 'mom',
    '10' => 'zed',
    '13' => 'aa',
    '23' => 'bobo',
    '33' => 'bambo',
    '43' => 'rip',
    '53' => 'die',
    '63' => 'exit',
    '73' => 'out',
    '83' => 'log',
    '18' => 'asc',
    '19' => 'mom',
    '110' => 'zed',
    '113' => 'aa',
    '123' => 'bobo',
    '133' => 'bambo',
    '143' => 'rip',
    '153' => 'die',
    '163' => 'exit',
    '173' => 'out',
    '183' => 'log',
    '28' => 'asc',
    '29' => 'mom',
    '210' => 'zed',
    '213' => 'aa',
    '223' => 'bobo',
    '323' => 'bambo',
    '432' => 'rip',
    '532' => 'die',
    '632' => 'exit',
    '732' => 'out',
    '823' => 'log',
    '82' => 'asc',
    '92' => 'mom',
    '130' => 'zed',
    '1433' => 'aa',
    '233' => 'bobo',
    '333' => 'bambo',
    '433' => 'rip',
    '353' => 'die',
    '633' => 'exit',
    '733' => 'out',
    '833' => 'log',
    '834' => 'asc',
    '93' => 'mom',
    '103' => 'zed',
    '1343' => 'aa',
    '2343' => 'bobo',
    '3343' => 'bambo',
    '434' => 'rip',
    '534' => 'die',
    '634' => 'exit',
    '734' => 'out',
    '835' => 'log',
    '85' => 'asc',
    '95' => 'mom',
    '150' => 'zed',
    '1573' => 'aa',
    '2573' => 'bobo',
    '3537' => 'bambo',
    '453' => 'rip',
    '553' => 'die',
    '653' => 'exit',
    '763' => 'out',
    '863' => 'log',
];
?>
<script>
    $('#ajaxCrudModal').removeAttr("tabindex");
</script>
<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Sku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProductName')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'CategoryId')->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumResultsForSearch' => 0
        ],
    ]);?>

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
