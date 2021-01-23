function menu(){
  // let menuHeight = $('header').outerHeight();
  // $('header + section').css('padding-top', menuHeight);
  if($(window).width() > 991){
    if($(window).scrollTop() > 0){
      if(!$('header').hasClass('animate')){
        $('header').addClass('animate');
      }
    }else{
      if($('header').hasClass('animate')){
        $('header').removeClass('animate');
      }
    }
  }
}

menu();

$(window).on('resize, scroll', function(){
  menu();
});


$('#home-slider').slick({
  autoplay: true,
  speed:1000,
  arrows: true,
  autoplaySpeed:2000,
  dots:false,
  nextArrow: $('#home-slider + .slider-nav').find('.slick-next'),
  prevArrow: $('#home-slider + .slider-nav').find('.slick-prev')
});


$('#products-slider').slick({
  autoplay:true,
  infinite: true,
  speed:1000,
  autoplaySpeed:2000,
  dots:true,
  slidesToShow: 4,
  slidesToScroll: 4,
});

$('#testemonials-slider').slick({
  autoplay:true,
  infinite: true,
  speed:1000,
  autoplaySpeed:2000,
  dots:true,
  arrows: false,
  slidesToShow: 1,
  slidesToScroll: 1,
  adaptiveHeight: true,
  responsive: [
    {
      breakpoint: 575,
      settings: {
        dots: true
      }
    },
  ],
});

$('#clients-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
  adaptiveHeight: true,
  responsive: [
    {
      breakpoint: 545,
      settings: {
        slidesToShow: 1
      }
    },
  ],
});

$('#products-carousel-1').slick({
  slidesToShow: 4,
  slidesToScroll: 4,
  arrows: false,
  dots: true,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      }
    },
  ],
});


$('.text-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  adaptiveHeight: true,
  arrows: false,
  dots: true,

});

$('.product-gallery').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  adaptiveHeight: true,
  arrows: false,
  asNavFor: '.product-gallery-nav'
});
$('.product-gallery-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.product-gallery',
  focusOnSelect: true,
  arrows: true
});

$('.responsive-select').on('change', function(){
  let tabSelector = $('.responsive-select').data('tab-selector');
    $(tabSelector).find('a').eq($(this).val()).tab('show');
});

// Search controls
$('#search-dialog-form').on("submit", function(e){
  e.preventDefault();
  let value = $(this).find('input').val();

    
  if (value.length > 4) {
    $(this).unbind('submit').submit();
  }else{
    let msg = "Зборот мора подолг од 4 букви.";
    $(this).find('.error-msg').addClass('show').html(msg);
  }
});

$("#uploadCV").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".upload-control").addClass("selected").html(fileName);
});
$('.slick-application').slick({
  slidesToShow: 3,
  slidesToScroll: 3,
  arrows: false,
  dots: true,
});

$('a[data-scroll]').on('click', function(e){
  e.preventDefault();
  let pos = $(this).data('scroll');
  let hHeight = $('header').height();
  $('html, body').animate({
      scrollTop: $(pos).offset().top - hHeight
  }, 1000);
});

$('a[data-input-subject]').on('click', function(e){
    e.preventDefault();
    let pos = $(this).data('target');
    let hHeight = $('header').height();
    let subject = $(this).data('input-subject');

    $(pos).find('input[data-form-subject="position"]').val(subject);

    $('html, body').animate({
      scrollTop: $(pos).offset().top - hHeight
    }, 1000);

});
