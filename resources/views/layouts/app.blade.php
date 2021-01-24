<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="token" id="token" value="{{ csrf_token() }}">
	@include('layouts/meta')

<link href="{{asset('assets/images/logo_tab.png')}}" rel="icon" type="image/png">
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('plugins/sweetalert/sweetalert.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick-theme.min.css')}}">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153141307-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153141307-1');
</script>

<!-- Global site tag (gtag.js) - Google Ads: 708033187 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-708033187"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-708033187'); </script>

</head>
<body>
<div class="alert alert-success alert-dismissible fade hide" role="alert"><p data-alert="msg" class="mb-0">Производот 'Универзален Мелем (100ml)' е додаден во кошничката!</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
@include('layouts/nav')

@yield('content')

<hr class="my-0">

<!--==========================
  Footer
============================-->
<footer>
	<div class="footer-top py-4 py-md-5 py-xl-80">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-7 col-md-4 mb-4 mb-md-0">
					<div class="mb-4 text-center text-md-left">	
						<a href="{{route('shop.index')}}">
							<img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="Logo">
						</a>
					</div>
					<div class="d-none d-md-block">
						<ul class="list-unstyled">
							<li>
								<span class="mr-3">Пон-пет:</span>
								<span class="">08:00am - 08:00pm</span>
							</li>
							<li>
								<span class="mr-3">Сабота:</span>
								<span class="">10:00am - 06:00pm</span>
							</li>
						</ul>
						<hr class="my-4">
						<div class="get-social">
							<p class="d-inline-block mr-4">Get Social</p>
							<ul class="d-inline-block list-inline mb-0">
								<li class="list-inline-item">
									<a href="https://www.facebook.com/naturatherapy.ks" target="_blank" class="link link-primary"><i class="fa fa-facebook icons" aria-hidden="true"></i></a>
								</li>
								<li class="list-inline-item">
									<a href="https://www.youtube.com/channel/UCSqpwiA5_ace07x3_NLlcqg" target="_blank" class="link link-primary"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
								</li>
								<li class="list-inline-item">
									<a href="https://instagram.com/naturatherapy.ks" target="_blank" class="link link-primary"><i class="fa fa-instagram icons mr-2" aria-hidden="true"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-7 col-md-4 mb-4 mb-md-0">
					<h6 class="h5 font-weight-bold text-center text-uppercase mb-4">{{trans('foot.contactus')}}</h6>
					<p class="font-weight-bold text-green text-center">{{trans('foot.companyNamefull')}}</p>
					<ul class="list-unstyled text-center">
						<li class="mb-2">	
							<a class="link" href="#">
								<img src="{{asset('assets/images/icons/pointer-icon.svg')}}" class="icon icon-xs d-inline-block mr-1"> {!!trans('foot.address')!!}
							</a>
						</li>
						<li class="mb-2">	
							<a class="link" href="#">
								<img src="{{asset('assets/images/icons/mail-icon.svg')}}" class="icon icon-xs d-inline-block mr-1"> {{trans('foot.emailfoot')}}
							</a>
						</li>
						<li class="mb-2">	
							<a class="link" href="#">
								<img src="{{asset('assets/images/icons/call-icon.svg')}}" class="icon icon-xs d-inline-block mr-1"> {{trans('foot.phonenumb')}}
							</a>
						</li>
						<li class="">	
							<a class="link" href="#">
								<img src="{{asset('assets/images/icons/call-icon.svg')}}" class="icon icon-xs d-inline-block mr-1"> {{trans('foot.phonenumb2')}}
							</a>
						</li>
					</ul>
					<div class="d-md-none text-center">
						<ul class="list-unstyled">
							<li>
								<span class="mr-3">{{trans('foot.workingdays')}}</span>
								<span class="">{{trans('foot.workinghours')}}</span>
							</li>
							<li>
								<span class="mr-3">{{trans('foot.saturday')}}:</span>
								<span class="">{{trans('foot.saturdayhours')}}</span>
							</li>
						</ul>
						<hr class="my-4">
						<div class="get-social">
							<p class="d-inline-block mr-4">{{trans('foot.getsocial')}}</p>
							<ul class="d-inline-block list-inline mb-0">
								<li class="list-inline-item">
									<a href="https://www.facebook.com/naturatherapy.ks" target="_blank" class="link link-primary"><i class="fa fa-facebook icons" aria-hidden="true"></i></a>
								</li>
								<li class="list-inline-item">
									<a href="https://www.youtube.com/channel/UCSqpwiA5_ace07x3_NLlcqg" target="_blank" class="link link-primary"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
								</li>
								<li class="list-inline-item">
									<a href="https://instagram.com/naturatherapy.ks" target="_blank" class="link link-primary"><i class="fa fa-instagram icons mr-2" aria-hidden="true"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-7 col-md-4 text-center text-md-left">
					
					<p class="mb-4">{!!trans('global.beinformed_text')!!}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom bg-light py-2 py-sm-3">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-12">
					<p class="mb-0">© Copyright {{date('Y')}} | <a href="{{route('shop.index')}}" class="link">Natura Therapy</a></p>
				</div>
				<div class="col-md-8 col-12">
					<ul class="footerlinks">
					
						
						<li class=""><a href="{{route('shop.payments.info')}}">{{trans('payments.title')}}</a></li>
						<li class=""><a href="{{route('shop.legal.info')}}">{{trans('legalpage.title')}}</a></li>

					</ul>
					<!--
					<div class="col-md-12"></div>
					<div class="footer-text-smaller">{{trans('payments.notification')}}</div>-->
				</div>
			</div>
			
		</div>
	</div>
</footer>
<div class="alert-notif-cart alert alert-success alert-dismissible fade " role="alert">
	<p data-alert="msg" class="mb-0 cart_added_notification">
		{{trans('global.product')}} <span class="alert_prod_name"></span> {{trans('alerts.addedtocart')}}
	</p>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>

<script src="{{asset('assets/javascript/jquery.min.js')}}"></script>
<script src="{{asset('assets/javascript/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/javascript/popper.min.js')}}"></script>
<script src="{{asset('assets/javascript/bootstrap.min.js')}}"></script>
		
<script type="text/javascript" src="{{asset('assets/javascript/slick.min.js')}}"></script>
<script src="{{ URL::asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/cart.js')}}"></script>
<script src="{{asset('js/lib/html5-form-validation/jquery.validation.min.js') }}"></script>


<script src="{{asset('assets/javascript/lazyload.min.js')}}"></script>

@if(Request::is('cart') || Request::is('about')  || Request::is('career'))
<script type="text/javascript" src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
@endif


<script src="{{asset('assets/javascript/index.js')}}" charset="utf-8"></script>
<script type="text/javascript" src="{{asset('js/main-v1.js')}}"></script>
<script type="text/javascript">
		var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
    // ... more custom settings?
	});
	if (lazyLoadInstance) {
	    lazyLoadInstance.update();
	}

</script>

<script type="text/javascript">
@if(Request::is('cart') || Request::is('about') || Request::is('career'))
var disabledates = [];
disabledates.push(new Date());
var today = new Date().getHours();
@if(isset($holidays_off))
    @foreach($holidays_off as $hol_k => $hol_v)
        var dateoff = "{{{$hol_v->dateoff}}}";
        var from = dateoff.split("-")
        var f = new Date(from[0], from[1] - 1, from[2],10,10,0)
        disabledates.push(f);
    @endforeach
@endif
var stardateC =new Date();
@if(Request::is('cms/add-order/step2*') && isset($_GET['date_ordered']) && $_GET['date_ordered'] != '')
  var startdate = "{{{$_GET['date_ordered']}}}";
  var startdateSPLIT = startdate.split(".");
  var stardateC = new Date(startdateSPLIT[2], startdateSPLIT[1] - 1, startdateSPLIT[0],10,10,0);
  stardateC.setDate(stardateC.getDate() + 1);
@endif

	$('.datepicker_nopast').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        format: 'dd.mm.yyyy',
        daysOfWeekDisabled:[0,6],
        datesDisabled:disabledates,
        minDate: 1,
        autoclose: true,
        startDate: stardateC
    });
$('.phoneformat').inputmask('+38\\9999999999', { 'placeholder': '+389xxxxxxxx ' });
@endif

 $(document).ready(function(){
 	$("form").attr('autocomplete', 'off');

 	});
</script>
@yield('scripts')
</body>
</html>