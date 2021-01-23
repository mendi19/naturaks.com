 //Check browser support
//localStorage.removeItem("cart");
//sessionStorage.removeItem("cart");
$('.order-controls-wrapper .control-increase').on('click', function(){
  $('.order-controls-wrapper .increment-control').get(0).stepUp();
   
   var id         = $(this).data('id'),
       type       = $(this).data('type'),
       getqty = $('.quantity_'+type+'_'+id).val();

      $('.add_cart_'+type+'_'+id).attr('data-qty', getqty);


});

$('.order-controls-wrapper .control-decrease').on('click', function(){
  $('.order-controls-wrapper .increment-control').get(0).stepDown();
});



$('.cart-order-controls-wrapper .control-increase').on('click', function(){
  let cartForm = $(this).parents('.cart-form');
  $(cartForm).find('.increment-control').get(0).stepUp();
});

$('.cart-order-controls-wrapper .control-decrease').on('click', function(){
   let cartForm = $(this).parents('.cart-form');
  $(cartForm).find('.increment-control').get(0).stepDown();
});

function hasDecimal(num){
    return !!(num % 1);
}
/*

*/
$.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    })
}


$('.add_to_cart').click(function(){
    var id         = $(this).data('id'),
        qty        = $(this).data('qty'),
        photopath  = $(this).data('photo-xs'),
        price      = $(this).data('price'),
        name       = $(this).data('name'),
        type       = $(this).data('type'),
        link       = $(this).data('link'),
        uniqueID         = id+"-"+type;
        var getqty = $('.quantity_'+type+'_'+id).val();

        addToCart(id,uniqueID,name,type,getqty,price,photopath,link);
   
      //  $('.alert-notif-cart').addClass('show');
        $('.alert-notif-cart').fadeTo(5000, 500).slideUp(500, function(){
          $('.alert-notif-cart').slideUp(500);
      }); 

        $('.alert_prod_name').text(name);
      
});
/*
$(document).on('change','.updateprice', function () {
  var item = $(this).data("item");
  var NEWPRICE  = $(this).val();
  console.log("VIA PRICE CHANGE="+NEWPRICE);
  addToCart(item.Qty,item.Product,item.Type,item.ID,item.OriginalPrice,NEWPRICE,item.Image,item.uniqueID,item.POPUSTPERCENT,item.DDV,item.DDV18,item.DDV5,item.DDV0,item.NRPRODUCTS);
});

$(document).on('change','.popust', function () {
  var item = $(this).data("item");
  var popust  = $(this).val();
  console.log("VIA DISCOUNT CHANGE="+popust);
  var NEWPRICE = item.Price;
  // var NEWPRICE = item.Price - ((item.Price/100) * popust);
  addToCart(item.Qty,item.Product,item.Type,item.ID,item.OriginalPrice,NEWPRICE,item.Image,item.uniqueID,popust,item.DDV,item.DDV18,item.DDV5,item.DDV0,item.NRPRODUCTS);
});
*/


$(document).on('click','.adddecrement', function () {
  var item = $(this).data("item");
  var newQTY = item.Qty - 1;
  if(newQTY < 0 || newQTY < 1){
    newQTY = 1;
  }
  console.log("MINUS="+newQTY);
  addToCart(item.ID,item.uniqueID,item.Product,item.Type,newQTY,item.Price,item.Image,item.Link);
});

$(document,window,'body').on('click','.addincrement', function () {
  var item = $(this).data("item");

  var   newQTY = parseInt(item.Qty) + 1;
  console.log("UNIQ="+item.uniqueID);
  console.log('PLUS='+newQTY);

 addToCart(item.ID,item.uniqueID,item.Product,item.Type,newQTY,item.Price,item.Image,item.Link);
});
/*
$(document).on('keyup','.cart-plus-minus-box',function(){
  //console.log($(this).val());
  var id = $(this).data('btn'),
      qty = $(this).val();
  $('.addbtnattr_'+id).attr('data-qtyselected', qty);

});*/


 var cart = [];  
        $(function () {
            if (sessionStorage.cart)
            {
                // load cart data from local storage
                cart = JSON.parse(sessionStorage.cart);  
         
                showCart();  // display cart that is loaded into cart array
                var currentpath = window.location.pathname;
            }else{
              $(".cart_checkout_btn").css("visibility", "hidden"); // hide table that shows cart
              $('.cart_text_emptycart').removeClass('d-none');
              $('.hidecartorno').addClass('d-none');
              $('.showifempty').removeClass('d-none');
            }
        });

  function addToCart(id,uniqueID,name,type,qty,price,img,link){
            var price = price;  // get selected product's price
            var qty = parseInt(qty);  // get quantity
            //alert(qty);
            if(qty > 0){
              // update Qty if product is already present
              for (var i in cart) {
                  if(cart[i].uniqueID == uniqueID)
                  {
                     // console.log("TYPE:"+type+": Name :"+name+" - P:"+cart[i].Product+": QTY:"+qty+": price:"+price);
                      cart[i].Qty = qty;  // replace existing Qty
                      cart[i].Price = price; 
                      showCart();
                      saveCart();
                      return;
                  }
              }
          
              var item = { Product: name, Price: price, Qty: qty, Image: img, Type: type, ID: id,uniqueID:uniqueID, Link:link};
              cart.push(item);
              saveCart();
              showCart();
            }
        }

function saveCart() {
  if (window.sessionStorage)
   {
    sessionStorage.cart = JSON.stringify(cart);
   }
}
    

    function deleteItem(index){
      console.log("INDEX TO DELETE="+index);
            cart.splice(index,1); // delete item at index            
            showCart();
            
            saveCart();

            showCart();
            var currentpath = window.location.pathname;

        }
var entityMap = {
  '&': '&amp;',
  '<': '&lt;',
  '>': '&gt;',
  '"': '&quot;',
  "'": '&#39;',
  '/': '&#x2F;',
  '`': '&#x60;',
  '=': '&#x3D;'
};

function escapeHtml (string) {
  return String(string).replace(/[&<>"'`=\/]/g, function (s) {
    return entityMap[s];
  });
}

function showCart() {

  console.log(cart);
        var ID_CURRENT = $('#ID_CURRENT').val() || 0;
   
         if (cart.length == 0) {
                 $('.cart_table').addClass('d-none');
                 $('.orderclientdetails').addClass('d-none');
                  $('.hidecartorno').addClass('d-none');
                  $('.showifempty').removeClass('d-none');

            }else{
               $('.cart_table').removeClass('d-none');
               $('.orderclientdetails').removeClass('d-none');

            }
            var shipping = 0;

            $("#cart").css("visibility", "visible");
            $(".show_cart_v2").empty();  

            $('.data-cart-items-nr').text(cart.length);

            var totaltopay = 0;var totalitemps = 0;var totaltopay2=0;var ddvvrednostnanaracka=0;
            var totalwithoutDDV  = 0;

            var ddv18=0;
            var ddv5=0;
            var baseddv18 = 0;
            var baseddv5  = 0;
            var deliveryprice  = 0;
            for (var i in cart) {
                var item = cart[i];

                if((item.ID+"-"+item.Type) == ID_CURRENT){
                  $('.show_current_cart_item').removeClass('d-none');
                }
                var popustreverse = (100 - item.POPUSTPERCENT) / 100;
                var NEWPRICEPERPRODUCT = item.Price * popustreverse;

                var makeddvvrednost = (NEWPRICEPERPRODUCT / (100 + parseInt(item.DDV))) * item.DDV;
                var makeBaseDDV  = NEWPRICEPERPRODUCT / (100 + parseInt(item.DDV));
                
                console.log("Price = "+NEWPRICEPERPRODUCT);
                if(item.Type == 0){
                  ddvvrednostnanaracka += makeddvvrednost * item.Qty;
                  if(item.DDV == 18){
                    ddv18 += makeddvvrednost * item.Qty;
                    baseddv18 += makeBaseDDV * 100 * item.Qty;;
                  }
                  if(item.DDV == 5){
                    ddv5   += makeddvvrednost *item.Qty;
                    baseddv5 += makeBaseDDV * 100 * item.Qty;;
                  }

                }else{
                   var splitprice = NEWPRICEPERPRODUCT / item.NRPRODUCTS;
                   ddv18 +=  (((splitprice / 118) * 18) * item.DDV18) * item.Qty;
                   ddv5  +=  (((splitprice / 105) * 5) * item.DDV5) * item.Qty;

                   baseddv18 +=  (((splitprice / 118) * 100) * item.DDV18) * item.Qty;
                   baseddv5  +=  (((splitprice / 105) * 100) * item.DDV5) * item.Qty;

                   console.log("DDV5:"+ddv5);
                   console.log("DDV18:"+ddv18);
                   ddvvrednostnanaracka += ddv18;
                   ddvvrednostnanaracka += ddv5;
                   console.log("Tota ddv:"+ddvvrednostnanaracka);
                }
                if(item.Qty > 0){
                    totaltopay+= (item.Qty * item.Price);
                  //  totaltopay2+= (item.Qty * NEWPRICEPERPRODUCT);
                    var row = '';

                    row += '<tr>';
                 
                    row += '<td  class="cart-item-img" ><img src="'+item.Image+'" class="cart-item-img mr-3" alt=""></td>';
                    row += '<td class="table-name-col align-middle"><a href="'+item.Link+'" class="link link-primary h5 font-weight-normal" target="_blank">'+item.Product+'</a></td>';
      

                    row += '<td class="align-middle"><span class="h5 text-green font-weight-normal">'+item.Price+'</span></td>';
                    
                    row += '<td class="table-action-col align-middle">';
                         row += '<div class="btn-toolbar cart-form">';
                         row += '<div class="cart-order-controls-wrapper form-group mb-0">';
                           row += '<input type="text" name="product" value="NT0003" hidden>';
                           row += '<input type="number" min="1" max="999" value="'+item.Qty+'" name="qty" class="form-control h-100 increment-control" id="quantity">';
                           row += '<div class="pl-1">';
                             row += '<button data-item="'+escapeHtml(JSON.stringify(item))+'" type="button" class="controls control-increase addincrement">+</button>';
                             row += '<button data-item="'+escapeHtml(JSON.stringify(item))+'" type="button" class="controls control-decrease adddecrement">-</button>';
                           row += '</div>';
                         row += '</div>';
                         row += '<div class="ml-lg-auto">';
                           row += '<button data-cart-control="delete" type="button" class="btn btn-no-style btn-lg ml-2"  onclick="deleteItem('+i+')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
                         row += '</div>';
                         row += '</div>';
                      row += ' </td>';

                 /*   row += '<td class="product-quantity my-auto">';

                     row +=  "<i data-item='"+escapeHtml(JSON.stringify(item))+"'  class='fa fa-minus-circle pt-2 adddecrement my-auto float-left'></i>";

                    row += '<input value="'+item.Qty+'" type="text"  class="form-control float-left my-auto m-2" style="text-align:center;width:70%;" readonly>';

                         row +=  "<i data-item='"+escapeHtml(JSON.stringify(item))+"' class='fa fa-plus-circle  pt-2 addincrement my-auto float-left'> </i>";
                    row += '</td>';

                    row += '<td><select  data-item="'+escapeHtml(JSON.stringify(item))+'" class="form-control popust" name="popust">';
                         row += '<option value="'+item.POPUSTPERCENT+'" >'+item.POPUSTPERCENT+'%</option>';
                    for(var j =0;j<=30;j+=5){
                          row += '<option value="'+j+'" >'+j+'%</option>';
                    }
                    row += '<option value="40">40%</option>';
                    row += '<option value="50">50%</option>';
                    row += '<option value="75">75%</option>';

                    row += '<option value="100">ГРАТИС - 100%</option>';
                    row += '</selected></td>';
             

                    row += '<td class="product-subtotal"><input type="text" value="'+(item.Price*item.Qty).toFixed(2)+'" class="form-control" readonly /></td>';
                    row += '<td class="product-subtotal"><input type="text" value="'+(NEWPRICEPERPRODUCT*item.Qty).toFixed(2)+'" class="form-control" readonly /></td>';
                       row += "<td class='product-remove'><a onclick='deleteItem(" + i + ")'><i class='fa fa-trash ion-android-close'></i></a></td>";
                    */
                    row += '</tr>';

                   $(".show_cart_v2").append(row);
                   totalitemps += parseInt(item.Qty);
                } 
            }


            var deliveryprice = 0;

            if(totaltopay < 900){
              deliveryprice = 100;
              totaltopay += 100;
            }

            $('#idscart').val(JSON.stringify(cart));
            totaltopay_withshipping = totaltopay;// + deliveryprice;
           
            $('.total-price').text(totaltopay_withshipping.toFixed(2));
            $('.deliveryprice').text(deliveryprice.toFixed(2));
  
}
    

$('.opencart').click(function(){
  $('.cart-full-wrapper').fadeIn(500);
  $('.cart-full-wrapper').addClass('showcart');
  $('body').css('overflow','hidden');
});
$('.MiniBasketDropdown__close-button').click(function(){
	$('.cart-full-wrapper').removeClass('showcart');
   $('.cart-full-wrapper').fadeOut(500);
    $('body').css('overflow','auto');
});
    

$(document).on('click','.clearcartbtn',function(){
  if (sessionStorage.cart){
      sessionStorage.removeItem('cart');
    
  }
  cart =[];
  showCart();
});



