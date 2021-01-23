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
		
				<li class="breadcrumb-item active" aria-current="page">{{trans('global.payment')}}</li>
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

		<div class="container  showifempty" data-content="partial">
				<div class="text-center">
					<h2 class="h1 mb-4 mb-lg-5">
					@if($data->TransId != '')
						{{ trans('alerts.success_payment_title')}}
					@else
						{{ trans('alerts.success_order_title')}}
					@endif
					</h2>
					<div class="row">
						<div class="col-md-6 mx-auto">
							  
		                  	  <p class="alert-v2 alert-v2-success">{!!trans('alerts.success_made_order')!!}</p>

		                  	 @if($data->TransId != '')<h3>{!!trans('alerts.transaction_number',array('id' => $data->TransId))!!}</h3>@endif
		                </div>
		            </div>


				</div>
					
		</div>

</section>
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		sessionStorage.removeItem('cart');
	    $('.data-cart-items-nr').text(0);

	      var token     = $("meta[name=csrf-token]").attr("content"),
      	  api_token = $("meta[name=api-token]").attr("content");


	      var dataM = new FormData();
          dataM.append('api_token',api_token);
          dataM.append('_token',token);
  
	      $.ajax({
                type: 'POST',
                url: "{{{route('api.send.email.success',array('id' => $data->id,'token' => $data->token))}}}",
                data: dataM,
                cache: false,
                dataType : 'json',   
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                headers:{'X-CSRF-Token': token},
                success: function(response) {
                	
                },
                error: function(response){

                }
            });
	});
</script>
@endsection