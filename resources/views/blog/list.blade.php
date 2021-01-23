@section('meta_og_title',trans('global.naucnodokazano'))
@section('meta_og_description','')

@section('meta_og_image',asset('assets/images/logo.svg'))
@section('meta_og_image_w',300)
@section('meta_og_image_h',300)


@extends('layouts/app')
@section('content')

		
	<section class="banner-section">
	<div class="banner banner-md bg-image img-fluid" style="background-image: url({{asset('assets/images/banners/top-banner.jpg')}})">
		<div class="side-banner" style="background-image: url({{asset('assets/images/banners/sidebanner.png')}})"></div>
		<div class="banner-content text-white text-center py-lg-5">		
			<div class="container">
				<h2 class="h1 my-lg-2">{{trans('global.naucnodokazano')}}</h2>
				<img src="{{asset('assets/images/signature-white.png')}}" class="img-fluid signature signature-lg">
			</div>
		</div>
	</div>
</section>
	<section class="breadcrumb-section bg-light">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb py-2 py-lg-3">
								<li class="breadcrumb-item">
					<a href="{{route('shop.index')}}">Дома</a>
				</li>
								<li class="breadcrumb-item active" aria-current="page">{{trans('global.naucnodokazano')}}</li>
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
							<div class="row mb-lg-5">

		@foreach($data as $k=>$value)
		<div class="col-sm-6 col-lg-4 mb-4 mb-lg-5">
			<div class="img-wrapper mb-3 mb-lg-4">
			<a href="{{route('shop.blog.view',array('slug' => $value->slug))}}">
				<img src="{{config('app.root_link_images')}}/{{$value->featured_image}}" class="img-fluid">
			</a>
			</div>
			<p class="text-green text-sm mb-3">2020-03-30 13:08:32</p>
			<a href="{{route('shop.blog.view',array('slug' => $value->slug))}}" class="link">
				<p class="font-weight-medium mb-3 mb-lg-4">{{$value->name}}</p>
			</a>

			<a href="{{route('shop.blog.view',array('slug' => $value->slug))}}" class="link link-secondary">Прочитајте повеќе</a>
		</div>
	@endforeach

	</div>
</div>
</div>
</section>

@endsection