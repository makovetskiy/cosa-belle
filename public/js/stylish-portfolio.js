function addToCart(id){
  var values = $("#cart_list").val();

  if (values.trim() == ''){
    values = values+id;
  }
  else{
    values = values +","+id;
  }
  localStorage.setItem("cart",values);
  arr = values.split(',');
  $("#count_cart").html(arr.length);
  $("#cart_list").val(values);
}

function kladr_start(){
    $('#full_address').kladr({
        oneString: true
    });
} 

$(document).ready(function(){
  if($(window).width()<=750){
    console.log($(window).width())
    $('.item').css('height', $(window).height()/3);
  }
  else{
    $('.item').css('height', $(window).height());
  }
  
});
$(window).resize(function() {
  if($(window).width()<=750){
    console.log($(window).width())
    $('.item').css('height', $(window).height()/3);
  }
  else{
    $('.item').css('height', $(window).height());
  }
});

function deleteLink(t){

    var tr = $(t).closest('tr');
    //goodIncrement(parseInt(tr.find("td:first").text()));
    tr.css("background-color","#FF3700");
    tr.fadeOut(400, function(){
    tr.remove();
      getAllPrice();
    });
    return false;
}

function getAllPrice(){

  var values = [];
  var price = 0;
  
  $('#cart tr td').each(function(index, val) {
    values.push($(val).text());
  });
  var x=4;
  var goods = "";
  for(var i=0;i<(values.length/4);i++){
    price += parseInt(values[x-2]); 
    goods += values[x-4]+',';
    x=x+4;
  }
  goods = goods.substring(0, goods.length - 1);
  localStorage.setItem("cart",goods);
  $("#cart_list").val(goods);
  $("#goods_list").val(goods);
  $("#goods_summ").text(price);
  arr = goods.split(',');
  $("#count_cart").html(arr.length);
}


$(document).ready(function() {

  var cart = localStorage.getItem("cart");
  var table = '';
  var summa = 0;
  $.get(
    '/goods',
      "cart=" + cart,
      function (result) {
        if(result.type == 'error') {
          return(false);
        }
        else {
          $(result).each(function() {
            summa = summa + parseInt(this.price);
            $("#goods_summ").text(summa);
            $("#cart > tbody").append("<tr><td>"
            +this.id+"</td><td>"+
            this.g_name+"</td><td>"+this.price+" р.</td>"+
            "<td><a class='deleteLink' onclick='deleteLink(this)'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>");
          });

        }
      },
    "json"
  );
  $('#address_block_id').hide();
  $('#delivery_text').hide();
  $('#pochta_text').hide();
  
  kladr_start();
  $('#delivery_type_id').change(function(){

        var t_id = $(this).val();
        if(t_id === 1 || t_id ==='1'){
            $('#delivery_price').val(200);
            $('#address_block_id').hide();
            $('#pochta_text').hide();
            $('#delivery_text').hide();
            $('#pickup_point_block_id').show();
        }
        if(t_id === 2 || t_id ==='2'){
            $('#delivery_price').val(300);
            $('#address_block_id').show();
            $('#delivery_text').show();
            $('#pochta_text').hide();
            $('#pickup_point_block_id').hide();
        }
        if(t_id === 3 || t_id ==='3'){
            $('#delivery_price').val(700);
            $('#address_block_id').show();
            $('#pochta_text').show();
            $('#delivery_text').hide();
            $('#pickup_point_block_id').hide();
        }
  });

  if(cart){
      $("#count_cart").html(cart.split(',').length);
      $("#cart_list").val(cart);
      $("#submit_btn").prop('disabled', false);
      $("#goods_list").val(cart);
  }
  else{
    $("#count_cart").html(0);
    $("#submit_btn").prop('disabled', true);
  }

    
  $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });



  $('.layout-buttons span').click(function() {
    var $elem = $(this);
    var $productList = $('.products');
    $elem.toggleClass('active');
    $elem.siblings().toggleClass('active');
    $productList.toggleClass('table-layout');   
  });
});




(function($) {
  "use strict"; // Start of use strict

  // Closes the sidebar menu
  $("#menu-close").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
  });


  // Opens the sidebar menu
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
  });

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $("#sidebar-wrapper").removeClass("active");
  });

  //#to-top button appears after scrolling
  var fixed = false;
  $(document).scroll(function() {
    if ($(this).scrollTop() > 250) {
      if (!fixed) {
        fixed = true;
        $('#to-top').show("slow", function() {
          $('#to-top').css({
            position: 'fixed',
            display: 'block'
          });
        });
      }
    } else {
      if (fixed) {
        fixed = false;
        $('#to-top').hide("slow", function() {
          $('#to-top').css({
            display: 'none'
          });
        });
      }
    }
  });

})(jQuery); // End of use strict

// Disable Google Maps scrolling
// See http://stackoverflow.com/a/25904582/1607849
// Disable scroll zooming and bind back the click event
var onMapMouseleaveHandler = function(event) {
  var that = $(this);
  that.on('click', onMapClickHandler);
  that.off('mouseleave', onMapMouseleaveHandler);
  that.find('iframe').css("pointer-events", "none");
}
var onMapClickHandler = function(event) {
  var that = $(this);
  // Disable the click handler until the user leaves the map area
  that.off('click', onMapClickHandler);
  // Enable scrolling zoom
  that.find('iframe').css("pointer-events", "auto");
  // Handle the mouse leave event
  that.on('mouseleave', onMapMouseleaveHandler);
}
// Enable map zooming with mouse scroll when the user clicks the map
$('.map').on('click', onMapClickHandler);
