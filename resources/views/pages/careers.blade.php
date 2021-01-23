@section('meta_og_title',trans('global.career'))
@section('meta_og_description','')

@section('meta_og_image',asset('assets/images/logo.svg'))
@section('meta_og_image_w',300)
@section('meta_og_image_h',300)


@extends('layouts/app')
@section('content')

		
	<section class="banner-section">
	<div class="banner banner-md bg-image" style="background-image: url({{asset('assets/images/career/kariera-header.jpg')}})">
		<div class="banner-content text-white text-center py-5">
			<div class="container">
				<h2 class="h1">{{trans('global.career')}}</h2>
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
								<li class="breadcrumb-item active" aria-current="page">{{trans('global.career')}}</li>
			</ol>
		</nav>
	</div>
</section>	<section class="section elements py-5 py-xl-100 overflow-hidden">
		<div class="element-top">
			<img src="{{asset('assets/images/flower-element-1-left.svg')}}" class="element-img element-img-lg">
		</div>
		<div class="element-bottom">
			<img src="{{asset('assets/images/flower-element-2-right.svg')}}" class="element-img element-img-lg">
		</div>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<img class="img-fluid" src="{{asset('assets/images/career/section-1.jpg')}}" alt="">
				</div>
				<div class="col-md-6 pl-xl-5 mb-4 mb-md-0">	
					<h2 class="h1 mb-4">{!!trans('career.career_h_1')!!}</h2>
					<div class="dynamic-content dots-style-1 pb-lg-4">
						<p>{!!trans('career.career_p_1')!!}</p>
					</div>
				</div>

			</div>
		</div>
	</section>
	<section class="section bg-light py-5 py-xl-100 overflow-hidden">
		<div class="container">
			<div class="accordion accordion-style-1" id="accordion1">

				
					{!!trans('career.career_p_2')!!}

			</div>
		</div>
	</section>
	
	<section id="contactForm" class="section elements py-5 py-xl-100">
		<div class="element-top">
			<img src="{{asset('assets/images/flower-element-1-left.svg')}}" class="element-img element-img-lg">
		</div>
		<div class="element-bottom">
			<img src="{{asset('assets/images/flower-element-2-right.svg')}}" class="element-img element-img-lg">
		</div>
		<div class="container">
			<div class="text-center">
				<h3 class="h1 mb-4 mb-lg-5">{{trans('career.bepartofnatura')}}</h3>
				<p class="mb-4 mb-lg-5">{!!trans('career.bepartofnatura_text')!!}</p>
			</div>
<form method="post" id="newcareer" name="newcareer" class="form-style-1">
    {{ method_field('POST') }} 

				<div class="row">
					<div class="col-md-6 form-group mb-md-4">
						<input type="text" class="form-control" placeholder="{{trans('global.fullname')}}" value="" name="fullname" data-validation="[NOTEMPTY]" >
					</div>
					<div class="col-md-6 form-group mb-md-4">
						<input data-form-subject="position" id="fillPosition" type="text" class="form-control" placeholder="{{trans('career.position_apply')}}" value="" name="position" data-validation="[NOTEMPTY]" >
					</div>
					<div class="col-md-6 form-group mb-md-4">
						<input type="text" class="form-control" placeholder="{{trans('global.region')}}" value="" name="city" data-validation="[NOTEMPTY]" >
					</div>
					<div class="col-md-6 form-group mb-md-4">
						<input id="uploadCV" type="file" class="form-control" placeholder="CV" value="" name="cv" hidden data-validation="[NOTEMPTY]" >
					    <label class="upload-control form-control" for="uploadCV">CV</label>
					</div>
					<div class="col-md-6 form-group mb-md-4">
						<input type="text" class="form-control" placeholder="{{trans('global.email')}}" value="" name="email" data-validation="[NOTEMPTY]" >
					</div>
					<div class="col-md-6 form-group mb-md-4">
						<input type="text" class="form-control phoneformat" placeholder="{{trans('global.phone')}}" value="" name="phone" data-validation="[NOTEMPTY]" >
					</div>
					<div class="col-12 form-group mb-md-4">
						<label>{{trans('global.additional_comment')}}</label>
						<textarea class="form-control" placeholder="{{trans('global.additional_comment')}}" name="message" rows="6"> </textarea>
					</div>
				
					<div class="col-12 text-right">
						<div id="showerrors__2"></div>
						<button type="submit" class="btn btn-secondary submit-this">{{trans('global.send')}}</button>
					</div>
				</div>
			</form>

		</div>
	</section>
	<hr class="my-0">


@endsection

@section('scripts')
<script type="text/javascript">
	validateforms("#newcareer",'.form-group',"global_call","{{{route('api.store.career')}}}",null,".submit-this","#showerrors__2","{{{trans('global.send')}}}",1);

</script>
@endsection