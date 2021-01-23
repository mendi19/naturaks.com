$('.order-controls-wrapper .control-increase').on('click', function(){
  $('.order-controls-wrapper .increment-control').get(0).stepUp();
});

$('.order-controls-wrapper .control-decrease').on('click', function(){
  $('.order-controls-wrapper .increment-control').get(0).stepDown();
});



$('.cart-order-controls-wrapper .control-increase').on('click', function(){

  let cartForm = $(this).parents('.cart-form');
  $(cartForm).find('.increment-control').get(0).stepUp();

  qtyChanged(cartForm);

});

$('.cart-order-controls-wrapper .control-decrease').on('click', function(){
   let cartForm = $(this).parents('.cart-form');
  $(cartForm).find('.increment-control').get(0).stepDown();

  qtyChanged(cartForm);

});


function qtyChanged(element){

  $.ajax({
    type: 'POST',
    url: '/update-cart-ajax',
    data: { 
      _token: $('meta[name="csrf-token"]').attr('content'),
      code: $(element).find('input[name="product"]').val(),
      qty: $(element).find('input[name="qty"]').val() > 0 ? $(element).find('input[name="qty"]').val() : 1
    },
    dataType: 'json',
    success: function(data){
      // console.log(data);
    }
  }).then(function(){
    updateCart();
  });
}


$('.cart-form [data-cart-control="addToCart"]').on('click', function(e){
  e.preventDefault();
  let cartForm = $(this).parents('.cart-form');
  $.ajax({
    type: 'POST',
    url: $(cartForm).attr('action'),
    data: { 
      _token: $('meta[name="csrf-token"]').attr('content'),
      product: $(cartForm).find('input[name="product"]').val(),
      qty: $(cartForm).find('input[name="qty"]').val() > 0 ? $(cartForm).find('input[name="qty"]').val() : 1
    },
    dataType: 'json',
    success: function(data){
      if(data.success){

        let msg = data.success;
        let alertHtml = '<div class="alert alert-success alert-dismissible fade show" role="alert"><p data-alert="msg" class="mb-0">' + msg + '</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        
        $('body').append(alertHtml);
        $('.alert.alert-success').alert();
        setTimeout(function(){
          $('.alert.alert-success').alert('close');
        }, 4000);

      }else if(data.alert){
        let msg = data.alert;
        let alertHtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><p data-alert="msg" class="mb-0">' + msg + '</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        
        $('body').append(alertHtml);
        $('.alert.alert-danger').alert();
        setTimeout(function(){
          $('.alert.alert-danger').alert('close');
        }, 4000);
      }
    }
  }).then(function(){
    updateCart();
  });
});

$('.cart-form [data-cart-control="delete"]').on('click', function(e){
  e.preventDefault();
  let cartForm = $(this).parents('.cart-form');
  console.log($(cartForm).find('input[name="product"]').val());
  $.ajax({
    type: 'POST',
    url: '/delete-from-cart-ajax',
    data: { 
      _token: $('meta[name="csrf-token"]').attr('content'),
      product: $(cartForm).find('input[name="product"]').val()
    },
    dataType: 'json',
    success: function(data){
      $(cartForm).parents('tr').remove();

      let msg = data.success;
      let alertHtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><p data-alert="msg" class="mb-0">' + msg + '</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
      
      $('body').append(alertHtml);
      $('.alert.alert-danger').alert();

      setTimeout(function(){
        $('.alert.alert-danger').alert('close');
      }, 4000);

    }
  }).then(function(){
    updateCart();
  });  

});


$('#send-order').on('submit', function(e){
  e.preventDefault();

  $.ajax({
    type: 'GET',
    url: '/order-success',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content')
    },
    dataType: 'json',
    success: function(data){
      $('[data-content="partial"]').children().fadeOut().promise().done(function(){
        
        let posY = $('[data-content="partial"]').offset().top;
        
        $('[data-content="partial"]').html(data.html);
        
        $("html, body").animate({scrollTop: 0}, 1000);
      
      });
    }
  });

});


function updateCart(){
  $.ajax({
    type: 'GET',
    url: '/check-cart',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content')
    },
    dataType: 'json',
    success: function(data){
      $('header [data-cart-items]').text(data.qty);
      $('[data-cart-label="total_price"]').text(data.total_price)
    }
  });
}


