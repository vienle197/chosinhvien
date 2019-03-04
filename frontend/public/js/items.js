var viewDetail = function (idProduct,parent) {
    $.ajax({
        url: '/service/item/get-detail',
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
        url: '/service/item/add-to-cart',
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
var changeCart = function () {
    var total = 0;
    $("input[name=checkBoxItem]").each(function () {
        if($(this).context.checked){
            var id_prod = $(this).val();
            total = total + parseInt($("#total_price_"+id_prod).val());
            // list.push($(this).val());
        }
    });
    $('#total_checkout').html(showMoney(total));
};
$(window).ready(function () {
    changeCart();
});

var removeItemCart = function (id) {
    var quantity = $('#quantity').val();
    $.ajax({
        url: '/service/item/remove-to-cart',
        method: "POST",
        data: {
            product_id: id,
        },
        dataType: "json",
        loading : true,
        success: function (result) {
            if(result.success){
                $('#product_'+id).html("");
                changeCart();
            }else {
                popupNotify('Fail', result.message)
            }
        }
    });
};
var changeQuantityInCart = function (type,prod_id) {
    var value = parseInt($('#quantity_cart_'+prod_id).val());
    switch (type) {
        case '+':
            value = value + 1;
            break;
        case '-':
            value = value - 1;
            break;
        default:
            value = value;
            break;
    }
    $('#quantity_cart_'+prod_id).val(value <= 0 ? 1 : value);
    $.ajax({
        url: '/service/item/add-to-cart',
        method: "POST",
        data: {
            product_id: prod_id,
            quantity: value,
            type: "edit",
        },
        dataType: "json",
        loading : true,
        success: function (result) {
            if(result.success){
                var total_amount = result.data.final_price_amount;
                $("#quantity_span").html(value);
                $("#final_total_amount").html(showMoney(total_amount));
                $("#total_price_"+prod_id).val(total_amount);
                changeCart();
            }else {
                popupNotify('Fail', result.message)
            }
        }
    });
};
var checkout = function () {
    loadShow("show");
    var list = [];
    $("input[name=checkBoxItem]").each(function () {
        if($(this).context.checked){
            var id_prod = $(this).val();
            list.push(id_prod);
        }
    });
    $.ajax({
        url: '/service/item/checkout',
        method: "POST",
        data: {
            list_id: list,
        },
        dataType: "json",
        loading : true,
        success: function (result) {
            if(result.success){
                window.location.assign("/checkout.html")
            }else {
                popupNotify('Fail', result.message)
            }
        }
    });
};