@extends('layouts/app')
@section('content')


	<section class="breadcrumb-section bg-light">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb py-2 py-lg-3">
								<li class="breadcrumb-item">
					<a href="{{route('shop.index')}}">Дома</a>
				</li>
								<li class="breadcrumb-item">
					<a href="{{route('shop.blog')}}">Научно докажано</a>
				</li>
								<li class="breadcrumb-item active" aria-current="page">{{$data->name}}</li>
			</ol>
		</nav>
	</div>
</section>		<section class="section product-section elements py-5 py-xl-100">
			<div class="element-top">
				<img src="{{asset('assets/images/slider/flower-element-1.svg')}}" class="element-img element-img-lg">
			</div>
			<div class="element-bottom">
				<img src="{{asset('assets/images/slider/flower-element-2.svg')}}" class="element-img element-img-lg element-img-rotate-1">
			</div>
			<div class="container position-relative">
				<div class="post-content dynamic-content row">
					<!--<div class="img-wrapper mb-4 mb-lg-5">
						<img src="{{config('app.root_link_images')}}/{{$data->featured_image}}" class="w-100">
					</div>-->
					<div class="col-md-4">
						<img src="{{config('app.root_link_images')}}/{{$data->featured_image}}" class="w-100">
					</div>
					<div class="col-md-8"> 
						<h3>{{$data->name}}</h3>
						{!!$data->description!!}
					</div>
				</div>
			</div>
		</section>
		<hr class="my-0">	
@endsection