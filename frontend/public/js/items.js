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
            }else {
                popupNotify('Fail', 'Get Product fail!')
            }
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
var addtocart = function (type) {
    var itemid = $('#product_id').val();
    var quantity = $('#quantity').val();
    $.ajax({
        url: 'service/item/add-to-cart',
        method: "POST",
        data: {
            product_id: itemid,
            quantity: quantity,
        },
        dataType: "json",
        loading : true,
        success: function (result) {
            if(result.success){
                if(type == 'cart'){
                    popupNotify('Thành công', "Đã thêm sản phẩm vào giỏ hàng.");
                }else {
                    window.location.assign('/cart/buynow');
                }
            }else {
                popupNotify('Fail', result.message)
            }
        }
    });
};