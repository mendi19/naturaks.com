@section('meta_og_title',trans('legalpage.title'))
@section('meta_og_description','')

@section('meta_og_image',asset('assets/images/logo.svg'))
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
				<li class="breadcrumb-item active" aria-current="page">{{trans('legalpage.title')}}</li>
			</ol>
		</nav>
	</div>
</section>

<section class="section bg-white py-5 ">
		<div class="container">
			<h2 class="h1 mb-4 mb-md-5">{{trans('legalpage.title')}}</h2>
			<div class="accordion accordion-style-1" id="accordion1">
				<div class="row">
					{!!trans('legalpage.content')!!}
				</div>
			</div>
		</div>
	</section>
@endsection