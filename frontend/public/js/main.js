(function($) {
  "use strict"

  // NAVIGATION
  var responsiveNav = $('#responsive-nav'),
    catToggle = $('#responsive-nav .category-nav .category-header'),
    catList = $('#responsive-nav .category-nav .category-list'),
    menuToggle = $('#responsive-nav .menu-nav .menu-header'),
    menuList = $('#responsive-nav .menu-nav .menu-list');

  catToggle.on('click', function() {
    menuList.removeClass('open');
    catList.toggleClass('open');
  });

  menuToggle.on('click', function() {
    catList.removeClass('open');
    menuList.toggleClass('open');
  });

  $(document).click(function(event) {
    if (!$(event.target).closest(responsiveNav).length) {
      if (responsiveNav.hasClass('open')) {
        responsiveNav.removeClass('open');
        $('#navigation').removeClass('shadow');
      } else {
        if ($(event.target).closest('.nav-toggle > button').length) {
          if (!menuList.hasClass('open') && !catList.hasClass('open')) {
            menuList.addClass('open');
          }
          $('#navigation').addClass('shadow');
          responsiveNav.addClass('open');
        }
      }
    }
  });

  // HOME SLICK
  $('#home-slick').slick({
    autoplay: true,
    infinite: true,
    speed: 300,
    arrows: true,
  });

  // PRODUCTS SLICK
  $('#product-slick-1').slick({
    slidesToShow: 3,
    slidesToScroll: 2,
    autoplay: true,
    infinite: true,
    speed: 300,
    dots: true,
    arrows: false,
    appendDots: '.product-slick-dots-1',
    responsive: [{
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 480,
        settings: {
          dots: false,
          arrows: true,
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
    ]
  });

  $('#product-slick-2').slick({
    slidesToShow: 3,
    slidesToScroll: 2,
    autoplay: true,
    infinite: true,
    speed: 300,
    dots: true,
    arrows: false,
    appendDots: '.product-slick-dots-2',
    responsive: [{
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 480,
        settings: {
          dots: false,
          arrows: true,
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
    ]
  });

  // PRODUCT DETAILS SLICK
  $('#product-main-view').slick({
    infinite: true,
    speed: 300,
    dots: false,
    arrows: true,
    fade: true,
    asNavFor: '#product-view',
  });

  $('#product-view').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    centerMode: true,
    focusOnSelect: true,
    asNavFor: '#product-main-view',
  });

  // PRODUCT ZOOM
  $('#product-main-view .product-view').zoom();

  // PRICE SLIDER
  var slider = document.getElementById('price-slider');
  if (slider) {
    noUiSlider.create(slider, {
      start: [1, 999],
      connect: true,
      tooltips: [true, true],
      format: {
        to: function(value) {
          return value.toFixed(2) + '$';
        },
        from: function(value) {
          return value
        }
      },
      range: {
        'min': 1,
        'max': 999
      }
    });
  }

})(jQuery);
var popupNotify = function (title,mess,action=null) {
  $('#titlePopup').html(title);
  $('#contentPopup').html(mess);
  if(action){
    $('.btnnotify').css("display",'none');
    $('.btnconfirm').removeAttr("style");
    $('#btnOk').attr('onclick',"window.location.assign('"+action+"')");
  }else {
    $('.btnnotify').removeAttr("style");
    $('.btnconfirm').css("display",'none');
  }
  $('#popupNotify').modal();
};
var login = function () {
  var username = $('#username').val();
  var password = $('#password').val();
  $.ajax({
    url: '/service/login/login',
    method: "POST",
    data: {
      username: username,
      password: password,
    },
    dataType: "json",
    loading : true,
    success: function (result) {
      if(result.success){
          window.location.reload(true);
      }else {
        popupNotify('Fail', result.message)
      }
    }
  });
};

var signUp = function () {
  var username = $('#username_sigup').val();
  var password = $('#password_signup').val();
  var re_password = $('#re_password_signup').val();
  if(re_password !== password){
    return popupNotify("Lỗi","Nhập lại mật khẩu không đúng");
  }
  var first_name = $('#first_name').val();
  var last_name = $('#last_name').val();
  var email = $('#email').val();
  var phone = $('#phone').val();

  $.ajax({
    url: '/service/login/signup',
    method: "POST",
    data: {
      username: username,
      password_hash: password,
      first_name: first_name,
      last_name: last_name,
      email: email,
      phone: phone,
    },
    dataType: "json",
    loading : true,
    success: function (result) {
      if(result.success){
        popupNotify('thành công', "Đăng ký thành công.");
        window.location.reload(true);
      }else {
        popupNotify('Fail', result.message)
      }
    }
  });
};

var logout = function () {
  $.ajax({
    url: '/service/login/logout',
    method: "POST",
    success: function (result) {
      window.location.reload(true);
    }
  });
};

var showMoney = function (total) {
  var str_total = total.toString();
  var textRes = "";
  var count = 0;
  for(var ind = str_total.length-1; ind >= 0 ; ind --){
    if(count == 3){
      textRes = str_total[ind]+"."+textRes;
      count = 0;
    }else {
      textRes = str_total[ind]+textRes;
    }
    count ++;
  }
  return '₫'+textRes;
};
var loadShow = function (type = "show") {
  $('.loading').css('display',type == 'show' ? 'block' : 'none');
};
$('#city_id').on('change', function (x) {
  var city_id = $('#city_id').val();
  if (city_id == "") {
    return;
  }
  var district = $.grep(districts, function (item, i) {
    return item.city_id == city_id;
  });
  var html = '<option value="0">-- Chọn quận huyện</option>';
  $.each(district, function (index, item) {
    html += '<option value="' + item.id + '">' + item.district_name + '</option>';
  });
  $('#district_id').html(html);
});
$('#district_id').on('change', function (x) {
  var district_id = $('#district_id').val();
  if (district_id == "") {
    return;
  }
  var ward = $.grep(wards, function (item, i) {
    return item.district_id == district_id;
  });
  var html = '<option value="0">-- Chọn phường xã</option>';
  $.each(ward, function (index, item) {
    html += '<option value="' + item.id + '">' + item.wards_name + '</option>';
  });
  $('#ward_id').html(html);
});

var addAddress = function () {
  var first_name = $('#first_name_address').val();
  var last_name = $('#last_name_address').val();
  var email = $('#email_address').val();
  var phone = $('#phone_address').val();
  var city_id = $('#city_id').val();
  var district_id = $('#district_id').val();
  var ward_id = $('#ward_id').val();
  var address = $('#address').val();
  if ($('#is_default').is(":checked"))
  {
    var is_default = 1;
  }
  if(!first_name || !last_name || !email || !phone || !city_id || !district_id || !ward_id || !address){
    return popupNotify("Lỗi","Vui lòng nhập đủ các trường!");
  }
  loadShow();
  $.ajax({
    url: '/service/account/add-address',
    method: "POST",
    data: {
      first_name: first_name,
      last_name: last_name,
      email: email,
      phone: phone,
      city_id: city_id,
      district_id: district_id,
      ward_id: ward_id,
      address: address,
      is_default: is_default == 'on' ? 1 : 0,
    },
    success: function (result) {
      window.location.reload(true);
    }
  });

};
var createOrder = function () {
  var address_id = $("input[name=address_id]:checked"). val();
  if(!address_id){
    return popupNotify("Lỗi","Vui lòng chọn địa chỉ nhận hàng!");
  }
  loadShow();
  $.ajax({
    url: '/service/item/create-order',
    method: "POST",
    data: {
      address_id: address_id,
    },
    success: function (result) {
      if(result.success){
        popupNotify('Thành công', result.message,'/');
      }else {
        popupNotify('Fail', result.message);
      }
    }
  });
};
$('input[name=address_id]').on('change', function (x) {
  var address_id = $("input[name=address_id]:checked"). val();
  var city_id = $('#city_id_'+address_id).val();
  var amount = parseInt($('#total_amount').val());
  var fee = city_id == 1 ? 0 : 20000;
  $('#shippingfee').html(showMoney(fee));
  $('#final_total_amount').html(showMoney(fee+amount));
});