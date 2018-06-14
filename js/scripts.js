<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/jscolor.min.js"></script>

<script>

// Back to Top

$(document).ready(function() {

  var offset = 300;
  var scrollDuration = 500;

  $(window).scroll(function() {
    if ($(this).scrollTop() > offset) {
      $('.top').fadeIn(300);
    } else {
      $('.top').fadeOut(500);
    }
  });

  $('.top').click(function(event) {
    event.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, scrollDuration);
  })
});

// Show / Hide Add Item

$(".add-panel-form").hide();

$(".add-panel").click(function(){
    $(this).next().toggle();
});

// Show / Hide Mobile Menu

$(".mobile-menu").hide();

$(".menu-trigger").click(function(){
    $(".mobile-menu").toggle(100);
});

// Show / Hide Registeration Panel

$(".register-panel").hide();

$("#register-button").click(function(){
    $(".register-panel").toggle(100);
});

// Active Class Navbar

$(function() {
     var pgurl = window.location.href.substr(window.location.href
.lastIndexOf("/")+1);
     $("nav ul li a").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          $(this).addClass("active");
     })
});


</script>
