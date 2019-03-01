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
                $('#detailModel').modal();
            }
            console.log(result);
        }
    });
};