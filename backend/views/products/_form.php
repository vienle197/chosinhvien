<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\db\Products */
/* @var $form yii\widgets\ActiveForm */
/* @var $data */
?>
<script>
    var data = <?= \yii\helpers\Json::htmlEncode($data)?>;
    console.log(data);
    $('#ajaxCrudModal').removeAttr("tabindex");
    $(document).ready(function(){
        var next = 1;
        $(".add-more").click(function(e){
            e.preventDefault();
            var addto = "#field" + next;
            var addRemove = "#field" + (next);
            next = next + 1;
            var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">';
            var newInput = $(newIn);
            var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
            var removeButton = $(removeBtn);
            $(addto).after(newInput);
            $(addRemove).after(removeButton);
            $("#field" + next).attr('data-source',$(addto).attr('data-source'));
            $("#count").val(next);

            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
        });



    });

</script>
<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Sku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProductName')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'CategoryId')->widget(Select2::classname(), [
        'data' => $data['category'],
        'options' => ['placeholder' => 'Select a category ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumResultsForSearch' => 0
        ],
    ]);?>

    <?= $form->field($model, 'ParentSKU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ManufacturerId')->widget(Select2::classname(), [
        'data' => $data['manufacturer'],
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumResultsForSearch' => 0
        ],
    ]);?>

    <?= $form->field($model, 'MerchantId')->widget(Select2::classname(), [
        'data' => $data['merchant'],
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumResultsForSearch' => 0
        ],
    ]);?>

    <?= $form->field($model, 'MetaKeywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StockQuantity')->input('number',['min'=>0,'value' => 0]) ?>

    <?= $form->field($model, 'AvailableStockQuantity')->input('number',['min'=>0,'value' => 0]) ?>

    <?= $form->field($model, 'OrderMinimumQuantity')->input('number',['min'=>1,'value' => 1]) ?>

    <?= $form->field($model, 'OrderMaximumQuantity')->input('number',['min'=>0,'value' => 0]) ?>

    <?= $form->field($model, 'Price')->input('number',['min'=>1,'value' => 1]) ?>

    <?= $form->field($model, 'SalePrice')->input('number',['min'=>1,'value' => 1]) ?>

    <?= $form->field($model, 'DateEndSale')->input('datetime-local') ?>

    <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'OptionVariations')->textarea(['rows' => 6]) ?>

    <select id="selectTest">
        <option value="123" >1234</option>
        <option value="1232" >12324</option>
        <option value="1233" >12334</option>
        <option value="1234" >12344</option>
        <option value="1235" >12354</option>
    </select>

    <input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button>

    <?= $form->field($model, 'DisableBuyButton')->checkbox() ?>

    <?= $form->field($model, 'AvailableForPreOrder')->checkbox() ?>

    <?= $form->field($model, 'Deleted')->checkbox() ?>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
