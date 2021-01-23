@section('meta_og_title',trans('global.cart'))
@section('meta_robots','noindex,nofollow')

@extends('layouts/app')

@section('content')

<section class="breadcrumb-section bg-light">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb py-2 py-lg-3">
								<li class="breadcrumb-item">
					<a href="{{route('shop.index')}}">{{trans('global.home')}}</a>
				</li>
		
				<li class="breadcrumb-item active" aria-current="page">{{trans('global.cart')}}</li>
			</ol>
		</nav>
	</div>
</section>


<section class="shop-section section elements py-5 py-xl-100">
		<div class="element-top">
			<img src="{{asset('assets/images/flower-element-1-left.svg')}}" class="element-img element-img-lg">
		</div>
		<div class="element-bottom">
			<img src="{{asset('assets/images/flower-element-2-right.svg')}}" class="element-img element-img-lg">
		</div>

		<div class="container d-none showifempty" data-content="partial">
				<div class="text-center">
					<h2 class="h1 mb-4 mb-lg-5">{{trans('global.productsincart')}}</h2>
					<div class="col-md-12 mx-auto text-center mb-5">
							<div class="alert-v2 alert-info">
								<i class="fa fa-info-circle"></i> {{trans('cart.ordercanbemadeonlyby')}}
							</div>
						</div>
					<p class="mb-4 mb-lg-5">{{trans('global.noprodincart')}}</p>
					<a href="{{route('shop.products')}}" class="btn btn-secondary">{{trans('global.backtoproducts')}}</a>
				</div>
					
		</div>


		<div class="container" data-content="partial">
<form method="post" id="neworder" name="neworder" class="form-style-1" autocomplete="off">

   <input type="hidden" value="" name="idscart" id="idscart">
    {{ method_field('POST') }} 
	<div class="mb-4 mb-md-5 hidecartorno">
						<h2 class="h1 mb-4 mb-lg-5 text-center">{{trans('global.productsincart')}}</h2>
						<div class="col-md-12 mx-auto text-center mb-5">
							<div class="alert-v2 alert-info">
								<i class="fa fa-info-circle"></i> {{trans('cart.ordercanbemadeonlyby')}}
							</div>
						</div>
						<div class="table-responsive ">
				<table class="table table-style-1 table-cart">
		  			<thead>
		  				<tr>
		  								<th colspan="2">{{trans("global.product")}}</th>
										<th>{{trans("global.price")}}</th>
										<th>{{trans("global.qty")}}</th>
		  				</tr>
		  			</thead>
		  			<tbody class="show_cart_v2">
					
					</tbody>
</table>
</div>
</div>
<div class="text-right hidecartorno">
	<p class="h4">{{trans('cart.isporaka')}}:<br> <span data-cart-label="total_price" class="deliveryprice">0</span> {{trans('general.currency')}}.</p>
</div>
<div class="text-right hidecartorno">
	<p class="h4">{{trans('cart.total_price')}}:<br> <span data-cart-label="total_price" class="total-price">0</span> {{trans('general.currency')}}.</p>
</div>
<hr class="my-4 hidecartorno">
					<div class="row justify-content-center hidecartorno">
						<div class="col-xl-10">
							<div class="text-center">
								<h3 class="h1 mb-4 mb-lg-5">{{trans('cart.head_1')}}</h3>
								<p class="mb-4 mb-lg-5">{!!trans('cart.text_2')!!}</p>
							</div>
							<div class="row">
								<div class="col-md-3 form-group mb-md-4">
									<label>{{trans('global.fname')}}</label>
									<input type="text" class="form-control" placeholder="{{trans('global.fname')}}" value="" name="name" data-validation="[NOTEMPTY]" >
								</div>
								<div class="col-md-3 form-group mb-md-4">
									<label>{{trans('global.lname')}}</label>
									<input type="text" class="form-control" placeholder="{{trans('global.lname')}}" value="" name="lastname" data-validation="[NOTEMPTY]" >
								</div>
								<div class="col-md-3 form-group mb-md-4">
									<label>{{trans('global.opstina')}}</label>
									<select class="form-control" id="opstina_select" name="opstina" data-validation="[NOTEMPTY]" >
										<option value="">{{trans('global.choose')}}</option>
										@foreach($cities as $k => $v)
											<option data-price="{{$v->price}}" value="{{$v->id}}">{{$v->name}}</option>
										@endforeach
									</select>
								</div>

								<div class="col-md-3 form-group mb-md-4">
									<label>{{trans('global.region')}}</label>
									<input type="text" class="form-control" placeholder="{{trans('global.region')}}" value="" name="area">
								</div>

								<div class="col-md-3 form-group mb-md-4">
									<label>{{trans('global.datedelivery')}}</label>
									<input type="text" class="form-control datepicker_nopast" placeholder="" value="" readonly name="delivery_date" data-validation="[NOTEMPTY]">
								</div><!--
									<div class="col-md-3 form-group mb-md-4">
									<label>{{trans('global.email')}}</label>
									<input type="text" class="form-control" placeholder="E-mail" value="" name="email" data-validation="[NOTEMPTY]" >
								</div>-->
								<div class="col-md-3 form-group mb-md-4">
									<label>{{trans('global.phone')}}</label>
									<input type="text" class="form-control phoneformat" placeholder="{{trans('global.phone')}}" value="" name="phone" data-validation="[NOTEMPTY]" >
									
								</div>
								<div class="col-md-12 form-group mb-md-4">
									<label>{{trans('global.addresstodeliver')}}</label>
									<input type="text" class="form-control" placeholder="{{trans('global.addresstodeliver')}}" value="" name="address" id="place_search" data-validation="[NOTEMPTY]" >
								</div>
								<!--
								  <div class="form-group col-md-12  ornewaddress ">
				                        <label>{{trans('global.drag_the_marker')}}</label>
				                        <div id="map_canvas"></div>
				                        <div id="map_canvas_fields" class="">
				                        <div class="col-md-6"><input type="hidden" value="{{$current_latituude}}" name="latitude" id="place_latitude"/> </div>
				                        <div class="col-md-6"><input type="hidden" value="{{$current_longitude}}" name="longitude" id="place_longitude"/> </div>
				                       </div>                     
				                  </div>-->

							
								<div class="col-12 form-group mb-md-4">
									<textarea class="form-control" placeholder="{{trans('global.additional_comment')}}" name="message" rows="6"></textarea>
								</div>
								<!--
								<div class="col-md-12">
										<div>
											<input type="radio" class="-control" id="pay_at_delivery" name="payment_method" value="0" data-validation="[NOTEMPTY]" >
											<label for="pay_at_delivery">{{trans('global.pay_at_delivery')}}</label>
										</div>
										<div>
											<input type="radio" class="-control" id="creditcard" name="payment_method" value="1" data-validation="[NOTEMPTY]" >
											<label for="creditcard">{{trans('global.creditcard')}}</label>
										</div>
								</div>-->
								<div class="col-md-12">
										<div class="text-right hidecartorno">
	<p class="h4">{{trans('cart.isporaka')}}:<br> <span data-cart-label="total_price" class="deliveryprice">0</span> {{trans('general.currency')}}.</p>
</div>
<div class="text-right hidecartorno">
	<p class="h4">{{trans('cart.total_price')}}:<br> <span data-cart-label="total_price" class="total-price">0</span> {{trans('general.currency')}}.</p>
</div>
								</div>
								<div class="col-12 text-right">
									<div id="showerrors__2"></div>
									<button type="submit" class="btn btn-secondary">{{trans('cart.confirm_order_btn')}}</button>
								</div>
							</div>
						</div>
					</div>
				</form>
						
		</div>
	</section>


@endsection

@section('scripts')
<script type="text/javascript">
	validateforms("#neworder",'.form-group',"global_call","{{{route('api.store.order.new')}}}",null,".submit-this","#showerrors__2","{{{trans('global.send')}}}",0);
	var map;
var lastMarker;
function initAutocomplete() {
            var zoom_mode = 8;
            @if($current_latituude > 0 && $current_longitude > 0)
                var myLatlng = new google.maps.LatLng('{{{$current_latituude}}}','{{{$current_longitude}}}');
                zoom_mode = 14;
            @else 
                var myLatlng = new google.maps.LatLng(41.6854717,21.4370066);
            @endif
          
        
            var lastMarker;
            var myOptions = {
                zoom: zoom_mode,
                center: myLatlng,
                scrollwheel: false,
                navigationControl: true,
                scaleControl: true,
                draggable: true,
                mapTypeControl: true,
                streetViewControl: false,
                zoomControl: true,

                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.SMALL,
                    position: google.maps.ControlPosition.RIGHT_CENTER
                },
                mapTypeId: 'terrain',
              //  types: ['GB'],
              //  componentRestrictions: {country: "GB"},
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
                
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            var input = document.getElementById('place_search');
            var searchBox = new google.maps.places.SearchBox(input);
            map.addListener('bounds_changed', function() {
              searchBox.setBounds(map.getBounds());
            });
           
            marker = new google.maps.Marker({
              map: map,
              draggable:true, 
              position: myLatlng
            });
               google.maps.event.addListener(marker, 'dragend', function() {
                  var point = marker.getPosition();
                   $('#place_latitude').val(point.lat().toFixed(6));
                   $('#place_longitude').val(point.lng().toFixed(6));
                                                                      });
var markers = [];
searchBox.addListener('places_changed', function() {
              var places = searchBox.getPlaces();
              if (places.length == 0) {
                return;
              }

              markers.forEach(function(marker) {
                marker.setMap(null);
              });
              console.log(places);
              markers = [];
              var bounds = new google.maps.LatLngBounds();
              update_the_map(places[0].geometry.location.lat().toFixed(6),places[0].geometry.location.lng().toFixed(6),1);
            });
} 

  function update_the_map(lat,lng,type){
                                                                var newLatLng = new google.maps.LatLng(lat, lng);
                                                                  var myOptions = {
                                                                        zoom: 15,
                                                                        center: newLatLng,
                                                                        scrollwheel: false,
                                                                        navigationControl: true,
                                                                        scaleControl: true,
                                                                        draggable: true,
                                                                        mapTypeControl: true,
                                                                        streetViewControl: false,
                                                                        zoomControl: true,
                                                                        zoomControlOptions: {
                                                                            style: google.maps.ZoomControlStyle.SMALL,
                                                                            position: google.maps.ControlPosition.RIGHT_CENTER
                                                                        },
                                                                        mapTypeId: 'terrain',
                                                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                                                    }
                                                                        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                                                                 var marker = new google.maps.Marker({
                                                                      position: newLatLng,
                                                                      draggable:true,
                                                                      map: map,
                                                                      title:""
                                                                  });
                                                                  
                                                                    marker.setPosition(newLatLng);
                                                                 
                                                                    
                                                                     if(type == 1){
                                                                      
                     
                                                                                var p1 = new google.maps.LatLng($('#place_latitude').val(),$('#place_longitude').val()),
                                                                                    p2 = new google.maps.LatLng(lat, lng),
                                                                                    getdistancefrompostcode =  calcDistance(p1, p2);
                                                                                    function calcDistance(p1, p2) {
                                                                                        return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
                                                                                    }
                                                                                      
                                                                      

                                                                                document.getElementById('place_latitude').value = lat;
                                                                                document.getElementById('place_longitude').value =lng;
                                                                                
                                                                                /* if(lat != ''){
                                                                                  update_tubelines(lat,lng);
                                                                                
                                                                              }*/
                                                                     }// end if type

                                                                      google.maps.event.addListener(marker, 'dragend', function() {
                                                                        var point = marker.getPosition();
                                                                        $('#place_latitude').val(point.lat().toFixed(6));
                                                                        $('#place_longitude').val(point.lng().toFixed(6));
                                                                      });

}

</script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqBKqQkLMvnQHOM0wHqtDdFRxRAY32qhE&libraries=places,geometry&callback=initAutocomplete&region=gb"
         async defer></script>
         <style type="text/css">
    #map_canvas{}

      #map_canvas {
        height: 100%;height: 250px;
      }
      /* Optional: Makes the sample page fill the window. */
   .datepicker_nopast:hover{cursor: pointer;}

</style>
@endsection