// include html
function includeHTML() {
  var z, i, elmnt, file, xhttp;
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    file = elmnt.getAttribute("w3-include-html");
    if (file) {
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {elmnt.innerHTML = this.responseText;}
          if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
          elmnt.removeAttribute("w3-include-html");
          includeHTML();
        }
      }      
      xhttp.open("GET", file, true);
      xhttp.send();
      return;
    }
  }
};
// active navbar
$(function(){
    $("#homepage").find(".js-active-home").addClass('active');
    $("#about").find(".js-active-about").addClass('active');
    $("#news").find(".js-active-news").addClass('active');
    $("#product-brand").find(".js-active-product-brand").addClass('active');
    $("#expo").find(".js-active-expo").addClass('active');
    $("#login").find(".js-active-login").addClass('active');
});
// swap color navbar
$(window).scroll(function() {    
  var scroll = $(window).scrollTop();

  if (scroll >= 200) {
      $(".js-add-color").addClass("bg-gradient-blue");
  } else {
      $(".js-add-color").removeClass("bg-gradient-blue");
  }
});
$(window).scroll(function() {    
  var scroll = $(window).scrollTop();

  if (scroll >= 200) {
      $(".js-swap-height").addClass("h-80");
  } else {
      $(".js-swap-height").removeClass("h-80");
  }
});
// totop
$(window).scroll(function() {
  if ($(this).scrollTop() >= 300) {       
      $('#return-to-top').fadeIn(200);    
  } else {
      $('#return-to-top').fadeOut(200);   
  }
});
$('#return-to-top').click(function() {      
  $('body,html').animate({
      scrollTop : 0                      
  }, 500);
});
// clone menulist to navbar mobile 
$(function(){
  var screen992       = 992
      ,wtopnav         = $(".wrapper-topnav");
  function responsive(){
      if ($(window).width() < screen992) {
          $('.js-nav-mobile').html($('.js-nav-desktop').html());
      }else{
          UIkit.offcanvas('#menu-of-canvas').hide();            
      }
  }
  $(window).resize(responsive).ready(responsive);
  
});
// filter search
  var options = {
	valueNames: [
		'name',
		'born',
    'address',
    'line',
		{ data: ['local']}
	],
	page: 9,
	pagination: true
};
var userList = new List('users', options);
function resetList(){
	userList.search();
	userList.filter();
	userList.update();
	$(".filter-all").prop('checked', true);
  //$('.filter').prop('checked', false);
  $( "#ddlFilter" ).val('');
	$('.search').val('');
	//console.log('Reset Successfully!');
};
function updateList(){
  var values_local = $("input[name=local]:checked").val();
	//var values_address = $("input[name=address]:checked").val();
	var values_address = $( "#ddlFilter" ).val();
	//console.log(values_local, values_address);
	userList.filter(function (item) {
		var localFilter = false;
		var addressFilter = false;
		
		if(values_local == "all")
		{ 
			localFilter = true;
		} else {
			localFilter = item.values().local.toLowerCase() == values_local.toLowerCase();
    }
    
		if(values_address == "")
		{ 
			addressFilter = true;
    }else{
      addressFilter = item.values().address.toLowerCase().indexOf(values_address.toLowerCase()) >= 0;
    }
    
		return addressFilter && localFilter
	});
	userList.update();
	//console.log('Filtered: ' + values_local);
}       
$(function(){
  //updateList();
  $("input[name=local]").change(updateList);
  //$('input[name=address]').change(updateList);
	$( "#ddlFilter" ).change(function() {
    updateList();
  });
	userList.on('updated', function (list) {
		if (list.matchingItems.length > 0) {
			$('.no-result').hide()
		} else {
			$('.no-result').show()
		}
	});
});
// swap display gird or list
$(function() {
  $('#list').click(function(event){event.preventDefault();$('#users .item').addClass('list-group-item');});
  $('#grid').click(function(event){event.preventDefault();$('#users .item').removeClass('list-group-item');$('#users .item').addClass('grid-group-item');});
});

