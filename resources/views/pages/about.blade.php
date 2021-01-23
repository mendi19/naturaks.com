@section('meta_og_title',trans('global.aboutus'))
@section('meta_og_description','')
@section('meta_robots','index,follow')
@section('meta_og_image',asset('assets/images/logo.svg'))
@section('meta_og_image_w',300)
@section('meta_og_image_h',300)

@extends('layouts/app')

@section('content')
	
	<section class="banner-section">
	<div class="banner banner-md bg-image" style="background-image: url({{asset('assets/images/about-header.jpg')}}">
		<div class="banner-content text-white text-center py-5">
			<div class="container">
				<h2 class="h1">{{trans('global.aboutus')}}</h2>
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
								<li class="breadcrumb-item active" aria-current="page">{{trans('global.aboutus')}}</li>
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
				<div class="col-md-6 pr-xl-5 mb-4 mb-md-0">	
					<h2 class="h1 mb-4">Natura Therapy</h2>
					<div class="text-slider dots-style-1 dots-style-left pb-lg-4">
						<div class="dynamic-content">
							@if(isset($data->description)){!!$data->description!!}@endif
						</div>
						
					</div>
				</div>
				<div class="col-md-6">
					<img class="img-fluid" src="{{asset('assets/images/about-section-1.jpg')}}" alt="">
				</div>
			</div>
		</div>
	</section>
	<section class="section bg-light py-5 py-xl-100 overflow-hidden">
		<div class="container">
			<h2 class="h1 text-center mb-4 mb-md-5">{{trans('about.ourteam')}}</h2>
			<div class="row row-employees justify-content-center">
				<div class="col-6 col-md-4 col-employees text-center mb-4">
					<div class="img-wrapper mb-4 pb-lg-2">
						<img src="{{asset('assets/images/team/sasko-drvosanski.jpg')}}?V=123123" class="img-fluid rounded-primary">

						<div class="img-wrapper-flip">
							<div class="img-wrapper-flip-2">
								<p class="h5 mb-2">
									<span>{!!trans('about.team_1')!!}</span>
								</p>
								{!!trans('about.team_1_p')!!}

							</div>
						</div>

					</div>
					<p class="h5 mb-2"><span class="heading-border">{!!trans('about.team_1')!!}</span></p>
					<p>{{trans('about.team_1_h')}}</p>
					
				</div>

				<div class="col-6 col-md-4 col-employees text-center mb-4">
					<div class="img-wrapper mb-4 pb-lg-2">
						<img src="{{asset('assets/images/team/marijana-filipov.jpg')}}" class="img-fluid rounded-primary">
						<div class="img-wrapper-flip">
							<div class="img-wrapper-flip-2">
								<p class="h5 mb-2">
									<span>{{trans('about.team_2')}}</span>
								</p>
								{!!trans('about.team_2_p')!!}
							</div>
						</div>
					</div>
					<p class="h5 mb-2"><span class="heading-border">{{trans('about.team_2')}}</span></p>
					<p>{{trans('about.team_2_h')}}</p>
					
				</div>

				<div class="col-6 col-md-4 col-employees text-center mb-4">
					<div class="img-wrapper mb-4 pb-lg-2">
						<img src="{{asset('assets/images/team/hristina-angeloska.jpg')}}" class="img-fluid rounded-primary">
						<div class="img-wrapper-flip">
							<div class="img-wrapper-flip-2">
								<p class="h5 mb-2">
									<span>{{trans('about.team_3')}}</span>
								</p>
									{!!trans('about.team_3_p')!!}


							</div>
						</div>
					</div>
					<p class="h5 mb-2"><span class="heading-border">{{trans('about.team_3')}}</span></p>
					<p>{{trans('about.team_3_h')}}</p>
					
				</div>

				<div class="col-6 col-md-4 col-employees text-center mb-4">
					<div class="img-wrapper mb-4 pb-lg-2">
						<img src="https://placehold.jp/500x500.png" class="img-fluid rounded-primary">
						<div class="img-wrapper-flip">
							<div class="img-wrapper-flip-2">
								<p class="h5 mb-2">
									<span>{{trans('about.team_4')}}</span>
								</p>
								{!!trans('about.team_4_p')!!}
								

							</div>
						</div>
					</div>
					<p class="h5 mb-2"><span class="heading-border">{{trans('about.team_4')}}</span></p>
					<p>{{trans('about.team_4_h')}}</p>
				</div>

				<div class="col-6 col-md-4 col-employees text-center mb-4">
					<div class="img-wrapper mb-4 pb-lg-2">
						<img src="https://placehold.jp/500x500.png" class="img-fluid rounded-primary">
						<div class="img-wrapper-flip">
							<div class="img-wrapper-flip-2">
								<p class="h5 mb-2">
									<span>{{trans('about.team_5')}}</span>
								</p>
								{!!trans('about.team_5_p')!!}
								


							</div>
						</div>
					</div>
					<p class="h5 mb-2"><span class="heading-border">{{trans('about.team_5')}}</span></p>
					<p>{{trans('about.team_5_h')}}</p>
				</div>
			</div>
		</div>
	</section>


	<section class="section elements py-5 py-xl-100">
		<div class="element-top">
			<img src="{{asset('assets/images/flower-element-1-left.svg')}}" class="element-img element-img-lg">
		</div>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 order-2 order-md-1">
					<img class="img-fluid mb-lg-50" src="{{asset('assets/images/about-section-4.jpg')}}" alt="">
				</div>
				<div class="col-md-6 pl-xl-5 order-1 order-md-2 mb-4 mb-md-0">
					<div class="tabs-style-1">
						<nav>
							<div class="nav nav-tabs" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-tab-1-tab" data-toggle="tab" href="#nav-tab-1" role="tab" aria-controls="nav-tab-1" aria-selected="true">{{trans('about.mision')}}</a>
								<a class="nav-item nav-link" id="nav-tab-2-tab" data-toggle="tab" href="#nav-tab-2" role="tab" aria-controls="nav-tab-2" aria-selected="false">{{trans('about.vision')}}</a>
								<a class="nav-item nav-link" id="nav-tab-3-tab" data-toggle="tab" href="#nav-tab-3" role="tab" aria-controls="nav-tab-3" aria-selected="false">{{trans('about.cel')}}</a>
							</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade dynamic-content show active pb-0" id="nav-tab-1" role="tabpanel" aria-labelledby="nav-tab-1-tab">
								<h3 class="h2 mb-4 mb-lg-4">{{trans('about.mision')}}</h3>
								@if(isset($data)){!!$data->misija!!}@endif
							</div>
							<div class="tab-pane fade dynamic-content pb-0" id="nav-tab-2" role="tabpanel" aria-labelledby="nav-tab-2-tab">
								<h3 class="h2 mb-4 mb-lg-4">{{trans('about.vision')}}</h3>
								@if(isset($data)){!!$data->vizija!!}@endif
							</div>
							<div class="tab-pane fade dynamic-content pb-0" id="nav-tab-3" role="tabpanel" aria-labelledby="nav-tab-3-tab">
								<h3 class="h2 mb-4 mb-lg-4">{{trans('about.nasacel')}}</h3>
								@if(isset($data)){!!$data->cel!!}@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="banner banner-md bg-image overlay-secondary py-5 py-xl-100" style="background-image: url({{asset('assets/images/about-parallax.jpg')}})">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="row justify-content-center">
							<div class="col-sm text-center mb-3 mb-md-0">
								<p class="h1 font-weight-bold text-white">100%</p>
								<hr class="my-3 hr-white hr-sm"></hr>
								<p class="h6 text-white mb-0">{{trans('about.ab_1')}}</p>
							</div>
							<div class="col-sm text-center mb-3 mb-md-0">
								<p class="h1 font-weight-bold text-white">10.000+</p>
								<hr class="my-3 hr-white hr-sm"></hr>
								<p class="h6 text-white mb-0">{{trans('about.ab_2')}}</p>
							</div>
							<div class="col-sm text-center">
								<p class="h1 font-weight-bold text-white">20+</p>
								<hr class="my-3 hr-white hr-sm"></hr>
								<p class="h6 text-white mb-0">{{trans('about.ab_3')}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section bg-primary py-5 py-xl-100 ">
		<div class="container">
			<h3 class="h1 text-center mb-4 mb-lg-5">{{trans('about.testimonial_header')}}</h3>
			<div id="clients-slider" class="slider slider-style-1 dots-style-1 pb-lg-4">
				<div>
					<div class="bg-white shadow-md rounded-primary text-center p-4 p-lg-5">
						<div class="px-xl-4 position-relative">	
							<img src="{{asset('assets/images/icons/quotes.svg')}}" class="icon-quotes icon icon-lg d-inline-block mb-3 mb-md-4">
							<p class="mb-lg-4">{{trans('about.testimonial_1')}}</p>
							<div class="row align-items-center justify-content-center">
								<div class="col-md-auto">
									<img src="{{asset('assets/images/testimonials/sefije-selmani.jpg')}}" alt="" class="rounded-circle user-img">
								</div>
								<div class="col-md-auto pl-0 pl-lg-2">
									<p class="h5 text-uppercase user-name mb-1 mb-lg-2">{{trans('about.testimonial_1_p')}}</p>
									<p class="h6 user-status font-italic font-weight-normal mb-0">{{trans('about.testimonial_satisfied')}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="bg-white shadow-md rounded-primary text-center p-4 p-lg-5">
						<div class="px-xl-4 position-relative">	
							<img src="{{asset('assets/images/icons/quotes.svg')}}" class="icon-quotes icon icon-lg d-inline-block mb-3 mb-md-4">
							<p class="mb-lg-4">{!!trans('about.testimonial_2')!!}</p>
							<div class="row align-items-center justify-content-center">
								<div class="col-md-auto">
									<img src="{{asset('assets/images/testimonials/stanka-kuc.jpg')}}" alt="" class="rounded-circle user-img">
								</div>
								<div class="col-md-auto pl-0 pl-lg-2">
									<p class="h5 text-uppercase user-name mb-1 mb-lg-2">{!!trans('about.testimonial_2_p')!!}</p>
									<p class="h6 user-status font-italic font-weight-normal mb-0">{{trans('about.testimonial_satisfied')}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="bg-white shadow-md rounded-primary text-center p-4 p-lg-5">
						<div class="px-xl-4 position-relative">	
							<img src="{{asset('assets/images/icons/quotes.svg')}}" class="icon-quotes icon icon-lg d-inline-block mb-3 mb-md-4">
							<p class="mb-lg-4">{!!trans('about.testimonial_3')!!}</p>
							<div class="row align-items-center justify-content-center">
								
								<div class="col-md-auto pl-0 pl-lg-2">
									<p class="h5 text-uppercase user-name mb-1 mb-lg-2">{!!trans('about.testimonial_3_p')!!}</p>
									<p class="h6 user-status font-italic font-weight-normal mb-0">{{trans('about.testimonial_satisfied')}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="bg-white shadow-md rounded-primary text-center p-4 p-lg-5">
						<div class="px-xl-4 position-relative">	
							<img src="{{asset('assets/images/icons/quotes.svg')}}" class="icon-quotes icon icon-lg d-inline-block mb-3 mb-md-4">
							<p class="mb-lg-4">{!!trans('about.testimonial_4')!!}</p>
							<div class="row align-items-center justify-content-center">
								<div class="col-md-auto">
									<img src="{{asset('assets/images/testimonials/zora-mladenovska.jpg')}}" alt="" class="rounded-circle user-img">
								</div>
								
								<div class="col-md-auto pl-0 pl-lg-2">
									<p class="h5 text-uppercase user-name mb-1 mb-lg-2">{{trans('about.testimonial_4_p')}}</p>
									<p class="h6 user-status font-italic font-weight-normal mb-0">{{trans('about.testimonial_satisfied')}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="bg-white shadow-md rounded-primary text-center p-4 p-lg-5">
						<div class="px-xl-4 position-relative">	
							<img src="{{asset('assets/images/icons/quotes.svg')}}" class="icon-quotes icon icon-lg d-inline-block mb-3 mb-md-4">
							<p class="mb-lg-4">{!!trans('about.testimonial_5')!!}</p>
							<div class="row align-items-center justify-content-center">
								
								<div class="col-md-auto pl-0 pl-lg-2">
									<p class="h5 text-uppercase user-name mb-1 mb-lg-2">{!!trans('about.testimonial_5_p')!!}</p>
									<p class="h6 user-status font-italic font-weight-normal mb-0">{{trans('about.testimonial_satisfied')}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="bg-white shadow-md rounded-primary text-center p-4 p-lg-5">
						<div class="px-xl-4 position-relative">	
							<img src="{{asset('assets/images/icons/quotes.svg')}}" class="icon-quotes icon icon-lg d-inline-block mb-3 mb-md-4">
							<p class="mb-lg-4">{!!trans('about.testimonial_6')!!}</p>
							<div class="row align-items-center justify-content-center">
								
								<div class="col-md-auto pl-0 pl-lg-2">
									<p class="h5 text-uppercase user-name mb-1 mb-lg-2">{{trans('about.testimonial_6_p')}}</p>
									<p class="h6 user-status font-italic font-weight-normal mb-0">{{trans('about.testimonial_satisfied')}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="section bg-light py-5 py-xl-100 overflow-hidden">
		<div class="container">
			<h2 class="h1 text-center mb-4 mb-md-5">{{trans('about.strucnisorabotn')}}</h2>
			<div class="row row-employees justify-content-center">
				<div class="col-6 col-md-4 col-employees text-center mb-4">
					<div class="img-wrapper mb-4 pb-lg-2">
						<img src="{{asset('assets/images/team/snezana-spirovska.jpg')}}" class="img-fluid rounded-primary">
					</div>
					<p class="h5 mb-2"><span class="heading-border">{{trans('about.team_6')}}</span></p>
					<p>{{trans('about.team_6_h')}}</p>
				</div>
				<div class="col-6 col-md-4 col-employees text-center mb-4">
					<div class="img-wrapper mb-4 pb-lg-2">
						<img src="{{asset('assets/images/team/ankica-stanojkovska.jpg')}}" class="img-fluid rounded-primary">
					</div>
					<p class="h5 mb-2"><span class="heading-border">{{trans('about.team_7')}}</span></p>
					<p>{{trans('about.team_7_h')}}</p>
				</div>
				<div class="col-6 col-md-4 col-employees text-center mb-4">
					<div class="img-wrapper mb-4 pb-lg-2">
						<img src="{{asset('assets/images/team/zoran-mihailovski.jpg')}}" class="img-fluid rounded-primary">
					</div>
					<p class="h5 mb-2"><span class="heading-border">{{trans('about.team_8')}}</span></p>
					<p>{{trans('about.team_8_h')}}</p>
				</div>
				
				
			</div>
		</div>
	</section>




	<section id="sovet" class="section elements py-5 py-xl-100">
		<div class="element-top">
			<img src="{{asset('assets/images/flower-element-1-left.svg')}}" class="element-img element-img-lg">
		</div>
		<div class="element-bottom">
			<img src="{{asset('assets/images/flower-element-2-right.svg')}}" class="element-img element-img-lg">
		</div>
		<div class="container">
			<div class="text-center">
				<h3 class="h1 mb-4 mb-lg-5">{{trans('global.asksovet')}}</h3>
				
			</div>
<form method="post" id="newcareer" name="newcareer" class="form-style-1">
    {{ method_field('POST') }} 

				<div class="row">
					<div class="col-md-6 form-group mb-md-4">
						<label>{{trans('global.fullname')}}</label>
						<input type="text" class="form-control" placeholder="Име и Презиме" value="" name="fullname" data-validation="[NOTEMPTY]" >
						<div class="invalid-tooltip">Внесете име!</div>
					</div>
				
				
					<div class="col-md-3 form-group mb-md-4">
						<label>{{trans('global.email')}}</label>
						<input type="text" class="form-control" placeholder="{{trans('global.email')}}" value="" name="email" data-validation="[NOTEMPTY]" >
					</div>
					<div class="col-md-3 form-group mb-md-4">
						<label>{{trans('global.phone')}}</label>
						<input type="text" class="form-control phoneformat" placeholder="{{trans('global.phone')}}" value="" name="phone" data-validation="[NOTEMPTY]" >
					</div>

						<div class="col-md-6 form-group mb-md-4">
						<label>{{trans('global.opstina')}}</label>
						<select class="form-control" name="opstina" data-validation="[NOTEMPTY]" >
										<option value="">{{trans('global.choose')}}</option>
										@foreach($cities as $k => $v)
											<option value="{{$v->name}}">{{$v->name}}</option>
										@endforeach
						</select>
					</div>
				

					<div class="col-md-6 form-group mb-md-4">
						<label>{{trans('global.region2')}}</label>
						<input type="text" class="form-control" placeholder="{{trans('global.region')}}" value="" name="region" data-validation="[NOTEMPTY]" >
					</div>
					<div class="col-12 form-group mb-md-4">
						<label>{{trans('global.asksover_tekst')}}</label>
						<textarea class="form-control" placeholder="{{trans('global.asksover_tekst')}}" name="message" rows="6" data-validation="[NOTEMPTY]"> </textarea>
					</div>
				
					<div class="col-12 text-right">
						<div id="showerrors__2"></div>
						<button type="submit" class="btn btn-secondary submit-this">{{trans('global.send')}}</button>
					</div>
				</div>
			</form>

		</div>
	</section>

@endsection


@section('scripts')
<script type="text/javascript">
	validateforms("#newcareer",'.form-group',"global_call","{{{route('api.pobaraj.sovet')}}}",null,".submit-this","#showerrors__2","{{{trans('global.send')}}}",1);

</script>
@endsection