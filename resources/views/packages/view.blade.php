@section('meta_og_title',$data->name)
@section('meta_og_description',$data->description_promo)
@section('meta_robots','index,follow')
@section('meta_og_image',featured_image_v2($data->id,$data->featured_image,'sm'))
@section('meta_og_image_w',300)
@section('meta_og_image_h',300)

@extends('layouts/app')
@section('content')

	<section class="breadcrumb-section bg-light">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb py-2 py-lg-3">
								<li class="breadcrumb-item">
					<a href="{{route('shop.index')}}">{{trans('global.home')}}</a>
				</li>
								<li class="breadcrumb-item">
					<a href="{{route('shop.packages')}}">{{trans('global.packages')}}</a>
				</li>
								<li class="breadcrumb-item active" aria-current="page">{{$data->name}}</li>
			</ol>
		</nav>
	</div>
</section>	<section class="section py-5 py-xl-100">
		<div class="container">
			<div class="row justify-content-lg-between mb-4 mb-xl-80">
				<div class="col-12">
					<div class="alert-v2 alert-success  mb-3 show_current_cart_item d-none">
						<div class="row">
							<div class="col-md-3">
								<a href="{{route('shop.cart')}}" class="btn mr-3 btn-block btn-sm btn-secondary">{{trans('global.viewcart')}}</a>
							</div>
							<div class="col-md-9 my-auto">
								{{$data->name}} {{trans('alerts.addedtoyourcart')}}
							</div>
						</div>
					</div>
					<input type="hidden" value="{{$data->id}}-1" id="ID_CURRENT" name="ID_CURRENT">
				</div>

				<div class="col-md-6 pr-xl-5 mb-4 mb-md-0">
					<div class="product-gallery mb-3">

					<div class="img-wrapper position-relative bg-light">
						<img src="{{featured_image_v2($data->id,$data->featured_image,'xs')}}" data-src="{{featured_image_v2($data->id,$data->featured_image,'lg')}}" class="w-100 lazy">
					</div>
					@if(isset($data->getimages) && $data->getimages->count() > 0)
						@foreach($data->getimages as $kk => $vv)
						<div class="img-wrapper position-relative bg-light">
							<img src="{{featured_image_v3($vv->package_id,$vv->image,'xs')}}" data-src="{{featured_image_v3($vv->package_id,$vv->image,'lg')}}" class="w-100 lazy">
						</div>
						@endforeach
					@endif


					</div>

					<div class="product-gallery-nav arrows-style-1">
						<div>
								<div class="img-wrapper position-relative bg-light @if(isset($data->getimages) && $data->getimages->count() == 0) d-none @endif">
					
									<img src="{{featured_image_v2($data->id,$data->featured_image,'xs')}}" data-src="{{featured_image_v2($data->id,$data->featured_image,'sm')}}" class="w-100 lazy">
								</div>
							</div>

						@if(isset($data->getimages) && $data->getimages->count() > 0)
							@foreach($data->getimages as $kk => $vv)
							<div>
								<div class="img-wrapper position-relative bg-light">
					
									<img src="{{featured_image_v3($vv->package_id,$vv->image,'xs')}}" data-src="{{featured_image_v3($vv->package_id,$vv->image,'xs')}}" class="w-100 lazy">
								</div>
							</div>
							@endforeach
						@endif

						
											</div>
				</div>
				<div class="col-md-6">
					<h1 class="h1 mb-4 mb-lg-4">{{$data->name}}</h1>
				
					{!! nl2br(e($data->description_promo)) !!}
					<hr class="my-3 my-md-4 my-xl-5">
					<div class="cart-form">
						<input type="text" name="product" value="NT-P0050" hidden="">
						<div class="row">
							<div class="col-12">
								@if(getfinalprice($data->minimal_price,$data->discounted_price,$data->discount_status,$data->discount_from_date,$data->discount_to_date,$data->discount_permanent_yesno,$data->discount_kolicina,$data->discount_kolicina_nolimit,trans('general.currency')) != $data->minimal_price)

								<p class="h6 product-title-2 text-sm font-weight-bold mb-2">a<span class="text-del">{{$data->minimal_price}} {{trans('general.currency')}}.</span></p>
							@endif

				<p class="h2 text-red mb-3 mb-lg-5">{{displayfinalprice($data->minimal_price,$data->discounted_price,$data->discount_status,$data->discount_from_date,$data->discount_to_date,$data->discount_permanent_yesno,$data->discount_kolicina,$data->discount_kolicina_nolimit,trans('general.currency'))}}.</p>
							</div>
							<div class="order-controls-wrapper form-group col-auto mb-0">
								<input type="number" min="1" max="999" value="1" name="qty" class="form-control h-100 increment-control quantity_1_{{$data->id}}" id="quantity">
								<div class="wrapper pl-1">
									<button type="button" class="controls control-increase" data-id="{{$data->id}}" data-type="1">+</button>
									<button type="button" class="controls control-decrease" data-id="{{$data->id}}" data-type="1"> -</button>
								</div>
							</div>
							<div class="col-auto align-self-center pl-sm-0">
								<a class="btn btn-secondary add_cart_1_{{$data->id}} add_to_cart"
								   data-id="{{$data->id}}" 
								   data-type="1"
								   data-price="{{getfinalprice($data->minimal_price,$data->discounted_price,$data->discount_status,$data->discount_from_date,$data->discount_to_date,$data->discount_permanent_yesno,$data->discount_kolicina,$data->discount_kolicina_nolimit,trans('general.currency'))}}"
								   data-qty="1"
								   data-link="{{route('shop.package.view',array('slug' => $data->slug))}}"
								   data-name="{{$data->name}}"
								   data-photo-xs="{{featured_image_v2($data->id,$data->featured_image,'xs')}}"
								   >{{trans('global.ordernow')}}</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="tabs-style-1 mb-lg-5 mt-2">
				<nav class="d-none d-sm-block">
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-tab-1-tab" data-toggle="tab" href="#nav-tab-1" role="tab" aria-controls="nav-tab-1" aria-selected="true">{{trans("global.description_prod")}}</a>
						
						@if($data->description_more != '')
						<a class="nav-item nav-link " id="nav-tab-2-tab" data-toggle="tab" href="#nav-tab-2" role="tab" aria-controls="nav-tab-2" aria-selected="true">{{trans('global.readmored')}}</a>
						@endif

						@if($data->pdf_upastvo != '')
						
							<a class="nav-item nav-link"  target="_blank" href="{{config('app.root_link_images').$data->pdf_upastvo}}" role="tab">{{trans('global.pdf_upastvo')}}</a>

						@endif
						@if($data->selling_stores != '')
							<a class="nav-item nav-link " id="nav-tab-3-tab" data-toggle="tab" href="#nav-tab-3" role="tab" aria-controls="nav-tab-3" aria-selected="true">{{trans('global.selling_stores')}}</a>
						@endif

					</div>
				</nav>
				<div class="responsive-tabs d-sm-none">
					<select class="custom-select custom-select-style-1 responsive-select" data-tab-selector="#nav-tab">
						<option value="0" selected="">{{trans("global.description_prod")}}</option>
						@if($data->description_more != '')
						<option value="1">{{trans('global.readmored')}}</option>
						@endif
						@if($data->selling_stores != '')
							<option value="2">{{trans('global.selling_stores')}}</option>
						@endif
					</select>
					
				</div>
				<div class="tab-content border-bottom" id="nav-tabContent">
					<div class="tab-pane fade dynamic-content show active" id="nav-tab-1" role="tabpanel" aria-labelledby="nav-tab-1-tab">
							{!! nl2br(e($data->description)) !!}
					</div>
					
					@if($data->description_more != '')
					<div class="tab-pane fade dynamic-content show " id="nav-tab-2" role="tabpanel" aria-labelledby="nav-tab-2-tab">					
							{!! nl2br(e($data->description_more)) !!}
					</div>
					@endif
					@if($data->selling_stores != '')
					<div class="tab-pane fade dynamic-content show " id="nav-tab-3" role="tabpanel" aria-labelledby="nav-tab-3-tab">					
							{!! nl2br(e($data->selling_stores)) !!}
					</div>
					@endif
				</div>
			</div>

			@if($data->url != '')
<?php 
$url =  $data->url;
parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
?>
<div class="row align-items-center mt-4 mt-lg-5">
				<div class="col-md-6 col-xl-7 pr-xl-5 mb-4 mb-md-0">
					<iframe width="100%" height="500" src="https://www.youtube.com/embed/{{$my_array_of_vars['v']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div class="col-md-6 col-xl-5 pl-xl-4">
					<h2 class="h1 mb-4 mb-lg-5">{{$data->name_url}}</h2>
					<p class="mb-4 mb-lg-4">{!! nl2br(e($data->video_description)) !!}</p>
					<div class="img-wrapper mb-4 mb-lg-5">
						<img src="{{asset('assets/images/potpis-drvoshanski.png')}}" class="signature signature-md" alt="">
					</div>
					<a href="{{$data->url}}" target="_blank" class="btn btn-secondary btn-arrow">{{trans('global.viewvideo')}}</a>
				</div>
			</div>
@endif

					</div>
	</section>


<section class="section bg-primary py-5 py-xl-100">
		<div class="container">
			<h1 class="h1 text-center font-weight-bold mb-4 mb-md-5">{{trans('global.relatedproducts')}}</h1>
			
			<div id="products-carousel-1" class="products-row dots-style-1 mb-5 pb-2 justify-content-center">
	
@if(isset($data->getrelatedpackages) && $data->getrelatedpackages->count()>0)
@foreach($data->getrelatedpackages as $kk => $vv)
@if($vv->package->status_webpage == 1)
<div class="product-col ">
		<div class="box-product bg-white product-animation">
			@if(getfinalprice($vv->package->minimal_price,$vv->package->discounted_price,$vv->package->discount_status,$vv->package->discount_from_date,$vv->package->discount_to_date,$vv->package->discount_permanent_yesno,$vv->package->discount_kolicina,$vv->package->discount_kolicina_nolimit,trans('general.currency')) != $vv->package->minimal_price)
						<div class="product-badge badge badge-promotion text-uppercase">{{trans('global.akciskaponuda')}}</div>
					@endif
			<a href="{{route('shop.package.view',array('slug' => $vv->package->slug))}}"  class="link link-dark">
							<div class="animation-content mb-3">
					<div class="img-wrapper product-img-wrapper justify-content-center">
						
						<img src="{{asset('images/icons/loading.gif')}}" data-src="{{featured_image_v2($vv->package_id,$vv->package->featured_image,'xs')}}" class="img-fluid mb-4 lazy" alt="">
											</div>
					<div class="text-center">
						<p class="h5 product-title-1 font-weight-bold">{{$vv->package->name}}</p>
						@if(getfinalprice($vv->package->minimal_price,$vv->package->discounted_price,$vv->package->discount_status,$vv->package->discount_from_date,$vv->package->discount_to_date,$vv->package->discount_permanent_yesno,$vv->package->discount_kolicina,$vv->package->discount_kolicina_nolimit,trans('general.currency')) != $vv->package->minimal_price)

								<p class="h6 product-title-2 text-sm font-weight-bold mb-2"><span class="text-del">{{$vv->package->minimal_price}} {{trans('general.currency')}}.</span></p>
							@endif
						<p class="h6 product-title-2 text-sm text-red font-weight-bold mb-0">  {{displayfinalprice($vv->package->minimal_price,$vv->package->discounted_price,$vv->package->discount_status,$vv->package->discount_from_date,$vv->package->discount_to_date,$vv->package->discount_permanent_yesno,$vv->package->discount_kolicina,$vv->package->discount_kolicina_nolimit,trans('general.currency'))}}.</p>
					</div>
				</div>
			</a>
			<div class="button-wrapper">
				<div class="cart-form">
					<input type="text" name="product" value="NT-P0029" hidden="">
					<button data-cart-control="addToCart" type="submit" class="btn btn-secondary btn-icon"><i class="fa fa-shopping-cart mr-2"></i><span>{{trans('global.order')}}</span></button>
				</div>
			</div>
		</div>
	</div>
	@endif
	@endforeach
@endif



@if(isset($data->getrelatedproducts) && $data->getrelatedproducts->count()>0)
@foreach($data->getrelatedproducts as $kk => $vv)
@if($vv->product->status_webpage == 1)
<div class="product-col">
		<div class="box-product bg-white product-animation">
			@if(getfinalprice($vv->product->price,$vv->product->discounted_price,$vv->product->discount_status,$vv->product->discount_from_date,$vv->product->discount_to_date,$vv->product->discount_permanent_yesno,$vv->product->discount_kolicina,$vv->product->discount_kolicina_nolimit,trans('general.currency')) != $vv->product->price)
						<div class="product-badge badge badge-promotion text-uppercase">{{trans('global.akciskaponuda')}}</div>
					@endif
			<a href="{{route('shop.product.view',array('slug' => $vv->product->slug))}}" class="link link-dark">
							<div class="animation-content mb-3">
					<div class="img-wrapper product-img-wrapper justify-content-center">
						
						<img src="{{asset('images/icons/loading.gif')}}" data-src="{{featured_image_v2($vv->package_id,$vv->product->featured_image,'xs')}}" class="img-fluid mb-4 lazy" alt="">
											</div>
					<div class="text-center">
						<p class="h5 product-title-1 font-weight-bold">{{$vv->product->name}}</p>
						@if(getfinalprice($vv->product->price,$vv->product->discounted_price,$vv->product->discount_status,$vv->product->discount_from_date,$vv->product->discount_to_date,$vv->product->discount_permanent_yesno,$vv->product->discount_kolicina,$vv->product->discount_kolicina_nolimit,trans('general.currency')) != $vv->product->price)

								<p class="h6 product-title-2 text-sm font-weight-bold mb-2"><span class="text-del">{{$vv->product->price}} {{trans('general.currency')}}.</span></p>
							@endif
						<p class="h6 product-title-2 text-sm text-red font-weight-bold mb-0">  {{displayfinalprice($vv->product->price,$vv->product->discounted_price,$vv->product->discount_status,$vv->product->discount_from_date,$vv->product->discount_to_date,$vv->product->discount_permanent_yesno,$vv->product->discount_kolicina,$vv->product->discount_kolicina_nolimit,trans('general.currency'))}}.</p>
					</div>
				</div>
			</a>
			<div class="button-wrapper">
				<div class="cart-form" action="http://new.naturatherapy.mk/add-to-cart-ajax">
					<input type="text" name="product" value="NT-P0029" hidden="">
					<button data-cart-control="addToCart" type="submit" class="btn btn-secondary btn-icon"><i class="fa fa-shopping-cart mr-2"></i><span>{{trans('global.order')}}</span></button>
				</div>
			</div>
		</div>
	</div>
	@endif
	@endforeach
@endif

</div>			
</div>
	</section>
@endsection