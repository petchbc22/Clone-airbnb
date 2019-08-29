// custom chagne style when scroll :)
$(function () {
    $(document).scroll(function () {
        var $nav = $(".navbar-custom");
        var $text = $(".custom-font-scroll");
        var $burger = $(".custom-icons");
        var $search = $(".search-dpn");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        $text.toggleClass('scrolled', $(this).scrollTop() > $text.height());
        $burger.toggleClass('scrolled', $(this).scrollTop() > $burger.height());
        $search.toggleClass('scrolled', $(this).scrollTop() > $search.height());
    });
});
// modal logout
function JSalerts(){
  swal({
    title: "ยืนยันที่จะออกจากระบบ",
   
    icon: "warning",
    buttons: [
      'ไม่ยืนยัน!',
      'ใช่ ฉันยืนยัน'
    ],
    dangerMode: true,
  }).then(function(isConfirm) {
    if (isConfirm) {
      window.location = "logout.php";
    } else {
      
    }
  });
}
  //
 
// check element if there is into function ^_^ 
$(function () {
  if ($('#fristpage').length) {
  $(document).scroll(function () {
      if ($(document).scrollTop() == 0) {
          $(".swap-scroll").fadeIn(function() {
              $(this).attr("src","img/logo-w.png").fadeIn();

          });
    } else {
          $('.swap-scroll').attr("src","img/logo.png");
    }
    });
  }
if ($('#reservations').length) {
  $(function() {
      // create Calendar from div HTML element
      $("#calendar").kendoCalendar();
      $("#calendars").kendoCalendar();
  });
  $( function() {
    /* Check width on page load*/
    if ( $(window).width() > 200) {
    $('#images-banner').addClass('maxw-100pc');
    }
    else{}
});
}
if ($('#detail').length) {
  $( function() {
    /* Check width on page load*/
    if ( $(window).width() > 1300) {
    $('#images-banner').addClass('maxw-90pc');
    $('.container').addClass('maxw-80pc');
    }
    else if( $(window).width() < 768) {
    $('.container').addClass('maxw-100pc');
    } else{}
});
var _latitude = 48.87;
var _longitude = 2.29;
  google.maps.event.addDomListener(window, 'load', initSubmitMap(_latitude,_longitude));
  function initSubmitMap(_latitude,_longitude){
      var mapCenter = new google.maps.LatLng(_latitude,_longitude);
      var mapOptions = {
          zoom: 15,
          center: mapCenter,
          disableDefaultUI: false,
          //scrollwheel: false,
          styles: mapStyles
      };
      var mapElement = document.getElementById('submit-map');
      var map = new google.maps.Map(mapElement, mapOptions);
      var marker = new MarkerWithLabel({
          position: mapCenter,
          map: map,
          icon: 'assets/img/marker.png',
          labelAnchor: new google.maps.Point(50, 0),
          draggable: true
      });
      $('#submit-map').removeClass('fade-map');
      google.maps.event.addListener(marker, "mouseup", function (event) {
          var latitude = this.position.lat();
          var longitude = this.position.lng();
          $('#latitude').val( this.position.lat() );
          $('#longitude').val( this.position.lng() );
      });
//      Autocomplete
      var input = /** @type {HTMLInputElement} */( document.getElementById('address-map') );
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.bindTo('bounds', map);
      google.maps.event.addListener(autocomplete, 'place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.geometry) {
              return;
          }
          if (place.geometry.viewport) {
              map.fitBounds(place.geometry.viewport);
          } else {
              map.setCenter(place.geometry.location);
              map.setZoom(17);
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);
          $('#latitude').val( marker.getPosition().lat() );
          $('#longitude').val( marker.getPosition().lng() );
          var address = '';
          if (place.address_components) {
          address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
          ].join(' ');
      }
  });
}
function success(position) {
  initSubmitMap(position.coords.latitude, position.coords.longitude);
  $('#latitude').val( position.coords.latitude );
  $('#longitude').val( position.coords.longitude );
}

$('.geo-location').on("click", function() {
  if (navigator.geolocation) {
      $('#submit-map').addClass('fade-map');
      navigator.geolocation.getCurrentPosition(success);
  } else {
      error('Geo Location is not supported');
  }
});
}
if ($('#main_search').length){
  $( function() {
    /* Check width on page load*/
    if ( $(window).width() > 1300) {
    $('.container').addClass('maxw-1400');
    }
    else {}
});
}
if ($('#addplace').length){
  $(function() {
    var max_fields      = 5 ; //maximum input boxes allowed
    var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
      e.preventDefault();
      if(x < max_fields){ //max input box allowed
        x++; //text box increment
              $(wrapper).append('<div class="mt-3 mb-3"><input type="text"'+
                  'class="form-control border-g pt-2 pb-2 count-form"'+
                  'style="float: left;width: 85%" required/><a href="#" '+
                  'class="remove_field pt-2 pb-2" style="float: left;width: 15%;height: 44px;">'+
                  '<span uk-icon="close"></span></a></div>'); //add input box
      }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
      e.preventDefault(); $(this).parent('div').remove(); x--;
    })
  });
    var _latitude = 48.87;
    var _longitude = 2.29;
    google.maps.event.addDomListener(window, 'load', initSubmitMap(_latitude,_longitude));
    function initSubmitMap(_latitude,_longitude){
        var mapCenter = new google.maps.LatLng(_latitude,_longitude);
        var mapOptions = {
            zoom: 15,
            center: mapCenter,
            disableDefaultUI: false,
            //scrollwheel: false,
            styles: mapStyles
        };
        var mapElement = document.getElementById('submit-map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new MarkerWithLabel({
            position: mapCenter,
            map: map,
            icon: 'assets/img/marker.png',
            labelAnchor: new google.maps.Point(50, 0),
            draggable: true
        });
        $('#submit-map').removeClass('fade-map');
        google.maps.event.addListener(marker, "mouseup", function (event) {
            var latitude = this.position.lat();
            var longitude = this.position.lng();
            $('#latitude').val( this.position.lat() );
            $('#longitude').val( this.position.lng() );
        });
//      Autocomplete
        var input = /** @type {HTMLInputElement} */( document.getElementById('address-map') );
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
            $('#latitude').val( marker.getPosition().lat() );
            $('#longitude').val( marker.getPosition().lng() );
            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
        });
    }
    function success(position) {
        initSubmitMap(position.coords.latitude, position.coords.longitude);
        $('#latitude').val( position.coords.latitude );
        $('#longitude').val( position.coords.longitude );
    }

    $('.geo-location').on("click", function() {
        if (navigator.geolocation) {
            $('#submit-map').addClass('fade-map');
            navigator.geolocation.getCurrentPosition(success);
        } else {
            error('Geo Location is not supported');
        }
    });
    
}
});
// slide automatic banner vh
setInterval(function() {
$('#slideshow > div:first')
    .fadeOut(3500)
    .next()
    .fadeIn(3500)
    .end()
    .appendTo('#slideshow');
}, 6000);

// add percent opacity
$("#nav-toggle").click(function(){
  $(".navbar-custom").toggleClass("add-percent-opacity");
});
// show/hide password
$('#check').click(function(){
  if('password' == $('#input-password').attr('type')){
        $('#input-password').prop('type', 'text');
        $("#check").text("ซ่อนรหัสผ่าน");
  }else{
        $('#input-password').prop('type', 'password');
        $("#check").text("แสดงรหัสผ่าน");
  }
});
// show/hide password in modal regis
$('#check-pwd-regis').click(function(){
  if('password' == $('#input-password-regis').attr('type')){
        $('#input-password-regis').prop('type', 'text');
        $("#check-pwd-regis").text("ซ่อนรหัสผ่าน");
  }else{
        $('#input-password-regis').prop('type', 'password');
        $("#check-pwd-regis").text("แสดงรหัสผ่าน");
  }
});
// validate     
$(function(){  
  $('#member_email').blur(function(){

    var member_email = $(this).val();

    $.ajax({
     url:'./check.php',
     method:"POST",
     data:{member_email:member_email},
     success:function(data)
     {
      if(data != '0')
      {
       $('#availability').html('<span class="text-danger">มีชื่อผู้ใช้นี้แล้ว</span>');
       $("#btnsubmit").attr('disabled');
       return false;
      }
      else
      {
       $('#availability').html('<span class="text-success"></span>');
       $("#btnsubmit").removeAttr('disabled');
       return true;
      }
     }
    })

 });
}); 
$(function() {
  $.validator.addMethod('filesize', function (value, element, arg) {
    if(element.files[0].size<=arg){
        return true;
    }else{
        return false;
    }
  });
  jQuery.validator.addMethod("passwordCheck",
  function(value, element, param) {
      if (this.optional(element)) {
          return true;
      } else if (!/[A-Z]/.test(value)) {
          return false;
      } else if (!/[a-z]/.test(value)) {
          return false;
      } else if (!/[0-9]/.test(value)) {
          return false;
      }

      return true;
  },
  "error msg here");

  $("form[name='registration']").validate({
    rules: {
      member_email: {
        required: true, 
        email: true,
      //   remote: {
      //     url: "check_email.php",
      //     type: "post",
      //     data: {
      //       username: function() {
      //         return $( "#email" ).val();
      //       }
      //     }
      // }
    },
      member_firstname: "required",
      member_lastname: "required",
      
      member_password: {
        required: true,
        minlength: 8,
        passwordCheck:true
      },
      member_birthday:"required",
      member_permission:"required",
      filUpload:{
        filesize: 3000000,
        required: true,
      }
      
    },
      messages: {
        member_email: {
          required: "จำเป็นต้องมีอีเมล",
          email:  "กรุณากรอกอีเมลที่ถูกต้อง",
          // remote:"This email address is already registered."
      },
      member_firstname: "กรุณากรอกชื่อของคุณ",
      member_lastname: "กรุณากรอกนามสกุลของคุณ",
      member_password: {
        required: "กรุณากรอกรหัสผ่าน",
        minlength: "รหัสผ่านของคุณต้องมีจำนวน 8 ตัวอักษรขึ้นไป",
        passwordCheck: "รหัสผ่านควรมีตัวพิมพ์เล็ก พิมพ์ใหญ่ และตัวเลข"
      },
      member_birthday: "กรุณากรอกวันเกิดของคุณ",
      member_permission: "กรุณาเลือกประเภทของคุณ",
      filUpload:{
        filesize:"กรุณาเลือกรูปภาพที่ไม่เกิน 3 Megabyte",
        required: "กรุณาเลือกรูปโปรไฟล์",
      }
    },
    submitHandler: function(form) {
      form.submit();
      
    }
    
  });
  $("form[name='login']").validate({
    rules: {
      member_email: {
        required: true,
        email: true
      },
      member_password: {
        required: true,
      },
    },
    messages: {
      member_email: {
        required : "จำเป็นต้องมีอีเมล",
        email : "กรุณากรอกอีเมลให้ถูกต้อง"
      } ,
      member_password: {
        required: "จำเป็นต้องมีรหัสผ่าน"
      },
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
  $("form[name='resetpwd']").validate({
    rules: {
      email: {
        required: true,
        email: true
      },
    },
    messages: {
      email: "จำเป็นต้องมีอีเมล",
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
  $("form[name='addplace']").validate({
    rules: {
      home_name: {
        required: true
      },
      home_price: {
        required: true
     
      },
      home_detail: {
        required: true
      },
      home_bed : {
        required: true
      },
      home_toilet : {
        required: true
      },
      home_bedroom : {
        required : true
      },
      "picture[]" : {
        required : true,
  
      }
  

    },
    messages: {
      home_name: {
        required : "กรุณากรอกชื่อสถานที่"
      } ,
      home_price: {
        required: "กรุณากรอกราคา",
      },
      home_detail: {
        required: "กรุณากรอกรายละเอียด",
      },
      home_bed: {
        required: "กรุณากรอกจำนวน",
      },
      home_toilet: {
        required: "กรุณากรอกจำนวน",
      },
      home_bedroom: {
        required: "กรุณากรอกจำนวน",
      },
      "picture[]" : {

        required: "กรุณาเลือกรูปภาพ"
      }

    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
// change logo icon to ddl menu
$( function() {
  /* Check width on page load*/
  if ( $(window).width() < 992) {
  $('.navbar-brand').attr({
      "href":"#",
      "data-toggle":"collapse",
      "data-target":"#navbarText",
      "aria-controls":"navbarText",
      "aria-expanded":"false" ,
      "aria-label":"Toggle navigation"
    });
  }
  else{}
});

$(".search-mobile").click(function(){
  $(".box-search-mobile-resp").toggleClass("display-show");
});

$(window).scroll(function() {
  if ($(this).scrollTop()) {
      $('.totop').removeClass("dpn");
    
  } else {
      $('.totop').addClass("dpn");
  }
});