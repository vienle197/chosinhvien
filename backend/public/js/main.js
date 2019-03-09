var updateOrder = function(id,status) {
  $.ajax({
    url: '/service/order/update-status',
    method: "POST",
    data: {
      order_id: id,
      status: status,
    },
    success: function (result) {
      if(result.success){
        window.location.reload();
      }else {
        alert(result.message);
      }
    }
  });
};