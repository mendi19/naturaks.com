@section('meta_og_title',trans('global.packages'))
@section('meta_og_description','')
@section('meta_robots','index,follow')
@section('meta_og_image','')
@section('meta_og_image_w',300)
@section('meta_og_image_h',300)

@extends('layouts/app')

@section('content')

			<section class="banner-section">
	<div class="banner banner-sm bg-image" style="background-image: url({{asset('assets/images/banners/top-banner.jpg')}})">
				<div class="banner-content text-white text-center py-5">
			<div class="container">
				<h2 class="h1">{{trans('global.packages')}}</h2>
			</div>
		</div>
			</div>
</section>
	<section class="breadcrumb-section bg-light">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb py-2 py-lg-3">
				<li class="breadcrumb-item">
					<a href="{{route('shop.index')}}">{{trans('global.home')}}</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">{{trans('global.packages')}}</li>
			</ol>
		</nav>
	</div>
</section>
	<section class="section product-section elements py-5 py-xl-100">
		<div class="element-top">
			<img src="{{asset('assets/images/flower-element-1-left.svg')}}" class="element-img element-img-lg">
		</div>
		<div class="element-bottom">
			<img src="{{asset('assets/images/flower-element-2-right.svg')}}" class="element-img element-img-lg element-img-rotate-1">
		</div>
		<div class="container">
			
<div class="row products-row mb-4">

	<div class="col-md-12">
		<ul class="listcategories">
			<li class="text-uppercase"><a href="{{route('shop.packages')}}" @if($category_id == 0) class="active_category" @endif>
			{{trans('global.allpackages')}}</a></li>

			@foreach(trans('arrays.products_categories') as $k=> $v)
				@if($k>0)
				<li ><a href="{{route('product.by.package',array('slug'=> trans('arrays.products_categories_slugs')[$k]))}}" @if($category_id == $k) class="active_category" @endif>{{$v}}</a></li>
				@endif
			@endforeach
		</ul>
	</div>

		@foreach($data as $k => $value)
		<div class="product-col col-6 col-md-4 col-lg-3 mb-3 mb-lg-5">
				<div class="box-product bg-light product-animation h-100">
					@if(getfinalprice($value->minimal_price,$value->discounted_price,$value->discount_status,$value->discount_from_date,$value->discount_to_date,$value->discount_permanent_yesno,$value->discount_kolicina,$value->discount_kolicina_nolimit,trans('general.currency')) != $value->minimal_price)
						<div class="product-badge badge badge-promotion text-uppercase">{{trans('global.akciskaponuda')}}</div>
					@endif
			<a href="{{route('shop.package.view',array('slug' => $value->slug))}}" class="link link-dark">
					<div class="animation-content mb-3">
						<div class="img-wrapper product-img-wrapper justify-content-center">
							<img src="{{asset('images/icons/spin.gif')}}" data-src="{{featured_image_v2($value->id,$value->featured_image,'xs')}}" class="img-fluid mb-4 lazy" alt="">
						</div>
						<div class="text-center">
							<p class="h5 product-title-1 font-weight-bold">{{$value->name}}</p>
							@if(getfinalprice($value->minimal_price,$value->discounted_price,$value->discount_status,$value->discount_from_date,$value->discount_to_date,$value->discount_permanent_yesno,$value->discount_kolicina,$value->discount_kolicina_nolimit,trans('general.currency')) != $value->minimal_price)

								<p class="h6 product-title-2 text-sm font-weight-bold mb-2"><span class="text-del">{{$value->minimal_price}} {{trans('general.currency')}}.</span></p>
							@endif
													<p class="h6 product-title-2 text-sm text-red font-weight-bold mb-0">  {{displayfinalprice($value->minimal_price,$value->discounted_price,$value->discount_status,$value->discount_from_date,$value->discount_to_date,$value->discount_permanent_yesno,$value->discount_kolicina,$value->discount_kolicina_nolimit,trans('general.currency'))}}.</p>
						</div>
					</div>				
				</a>
			<div class="button-wrapper">
				<a href="{{route('shop.package.view',array('slug' => $value->slug))}}" class="btn btn-secondary btn-icon"><i class="fa fa-shopping-cart mr-2"></i><span>{{trans('global.order')}}</span></a>
			</div>
			
		</div>
	</div>	
	@endforeach

</div>
</div>
</section>

@endsection