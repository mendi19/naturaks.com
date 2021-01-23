@section('meta_og_title',trans('nutrigenist.nutrigenist'))
@section('meta_og_description','')
@section('meta_robots','index,follow')
@section('meta_og_image',asset('assets/images/logo.svg'))
@section('meta_og_image_w',300)
@section('meta_og_image_h',300)
@extends('layouts/app')

@section('content')

		
	<section class="banner-section">
	<div class="banner banner-md bg-image" style="background-image: url({{asset('assets/images/nutrigenetika-header.jpg')}})">
		<div class="banner-content text-white text-center py-5">
			<div class="container">
				<h2 class="h1">{{trans('nutrigenist.nutrigenist')}}</h2>
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
								<li class="breadcrumb-item active" aria-current="page">{{trans('nutrigenist.nutrigenist')}}</li>
			</ol>
		</nav>
	</div>
</section>
	<section class="section elements py-5 py-xl-100">
		<div class="element-top">
			<img src="{{asset('assets/images/flower-element-1-left.svg')}}" class="element-img element-img-lg">
		</div>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 order-2 order-md-1">
					<img class="img-fluid" src="{{asset('assets/images/nutrigenetika-section-1.jpg')}}" alt="">
				</div>
				<div class="col-md-6 pl-xl-5 order-1 order-md-2 mb-4 mb-md-0">
					<h1 class="h1 mb-4">{{trans('nutrigenist.whynutri')}}</h1>
					<div class="text-slider dots-style-1 dots-style-left pb-lg-4">
						<div class="dynamic-content">
							{!!trans('nutrigenist.p_1')!!}
						</div>
						{!!trans('nutrigenist.p_2')!!}
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section bg-light py-5 py-xl-100">
		<div class="container">
			<h2 class="h1 mb-4 mb-md-5 text-center">{{trans('nutrigenist.head_2')}}</h2>
			<p class="mb-4 mb-lg-5 text-center">{{trans('nutrigenist.head_p_2')}}</p>
			<div class="accordion accordion-style-1" id="accordion1">
				<div class="row">
					<div class="col-lg-6">
						<div class="card mb-lg-4">
							<div class="card-header" id="heading1">
								<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
									<h5 class="h5 h5-to-h6-md h5-to-h6-sm h5-to-h6 font-weight-medium mb-0">{{trans('nutrigenist.hh_1')}}</h5>
								</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion1">
								<div class="card-body dynamic-content pb-0">
									<p>{{trans('nutrigenist.pp_1')}}</p>
								</div>
							</div>
						</div>
						<div class="card mb-lg-4">
							<div class="card-header" id="heading2">	
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
									<h5 class="h5 h5-to-h6-md h5-to-h6-sm h5-to-h6 font-weight-medium mb-0">{{trans('nutrigenist.hh_2')}}</h5>
								</button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion1">
								<div class="card-body dynamic-content pb-0">
									<p>{{trans('nutrigenist.pp_2')}}</p>
								</div>
							</div>
						</div>
						<div class="card mb-lg-4">
							<div class="card-header" id="heading3">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
									<h5 class="h5 h5-to-h6-md h5-to-h6-sm h5-to-h6 font-weight-medium mb-0">{{trans('nutrigenist.hh_3')}}</h5>
								</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion1">
								<div class="card-body dynamic-content pb-0">
									<p>{{trans('nutrigenist.pp_3')}}</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card mb-lg-4">
							<div class="card-header" id="heading4">
								<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
									<h5 class="h5 h5-to-h6-md h5-to-h6-sm h5-to-h6 font-weight-medium mb-0">{{trans('nutrigenist.hh_4')}}</h5>
								</button>
							</div>
							<div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion1">
								<div class="card-body dynamic-content pb-0">
									<p>{{trans('nutrigenist.pp_4')}}</p>
								</div>
							</div>
						</div>
						<div class="card mb-lg-4">
							<div class="card-header" id="heading5">	
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
									<h5 class="h5 h5-to-h6-md h5-to-h6-sm h5-to-h6 font-weight-medium mb-0">{{trans('nutrigenist.hh_5')}}</h5>
								</button>
							</div>
							<div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion1">
								<div class="card-body dynamic-content pb-0">
									<p>{{trans('nutrigenist.pp_5')}}</p>
								</div>
							</div>
						</div>
						<div class="card mb-lg-4">
							<div class="card-header" id="heading6">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
									<h5 class="h5 h5-to-h6-md h5-to-h6-sm h5-to-h6 font-weight-medium mb-0">{{trans('nutrigenist.hh_6')}}</h5>
								</button>
							</div>
							<div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion1">
								<div class="card-body dynamic-content pb-0">
									<p>{{trans('nutrigenist.pp_6')}}</p>
								</div>
							</div>
						</div>
						<div class="card mb-lg-4">
							<div class="card-header" id="heading7">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
									<h5 class="h5 h5-to-h6-md h5-to-h6-sm h5-to-h6 font-weight-medium mb-0">{{trans('nutrigenist.hh_7')}}</h5>
								</button>
							</div>
							<div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion1">
								<div class="card-body dynamic-content pb-0">
									{!!trans('nutrigenist.pp_7')!!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection