var viewDetail = function (idProduct,parent) {
    $.ajax({
        url: 'service/item/get-detail',
        method: "POST",
        data: {
            id: idProduct,
            parent_sku: parent,
        },
        dataType: "json",
        success: function (result) {
            if(result.success){
                $('#modal_body_detail').html(result.data.content);
                $('#detailModel').modal();
            }
            console.log(result);
        }
    });
};
var changeQuantity = function (type) {
  var value = parseInt($('#quantity').val());
  value = type == "+" ? value + 1 : value - 1;
    $('#quantity').val(value <= 0 ? 1 : value);
};

var changeInputNumber = function(){
    var value = parseInt($('#quantity').val());
    $('#quantity').val(value <= 0 ? 1 : value);
};