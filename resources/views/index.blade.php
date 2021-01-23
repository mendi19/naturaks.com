@section('meta_og_title',trans('meta.homepage_meta_title'))
@section('meta_og_description','')
@section('meta_robots','index,follow')
@section('meta_og_image',asset('assets/images/logo.svg'))
@section('meta_og_image_w',300)
@section('meta_og_image_h',300)

@extends('layouts/app')

@section('content')
    <section class="section slide-section position-relative mb-5 mb-xl-100">
        <div id="home-slider" class="slider bg-light">
                
            @foreach($recomended_packages as $kpack => $vPack)
            <div class="slide-wrapper bg-light">
                <div class="slider-content">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-slide-content col-sm-6 col-md-6 col-lg-6 order-2 order-sm-1">
                                <p class="h4 slider-text text-red mb-3">{{trans('global.packetoffer')}}</p>
                                <h1 class="h1 slider-title mb-3 mb-lg-4 text-uppercase">{{$vPack->name}}</h1>
                                <p class="h4 slider-text text-red mb-3 mb-md-4 mb-lg-5">{{trans('global.foronly')}} {{displayfinalprice($vPack->minimal_price,$vPack->discounted_price,$vPack->discount_status,$vPack->discount_from_date,$vPack->discount_to_date,$vPack->discount_permanent_yesno,$vPack->discount_kolicina,$vPack->discount_kolicina_nolimit,trans('general.currency'))}}.</p>
                                <div class="pt-lg-2">
                                    <a href="{{route('shop.package.view',array('slug' => $vPack->slug))}}" class="btn btn-secondary btn-arrow">{{trans('global.ordernow')}}</a>
                                </div>
                            </div>
                            <div class="col-slide-image col-sm-6 col-md-6 col-lg-6 order-1 order-sm-2">
                                <div class="slider-product elements py-lg-50 py-xl-80 py-xxl-150">
                                    <div class="slider-img">
 <div class="img-wrapper bg-image bg-size-contain" style="background-image: url('{{asset('assets/images/slider/product-bg.svg')}}">
                                            <img src="{{featured_image_v2($vPack->id,$vPack->featured_image,'sm')}}" class="img-fluid mx-auto">
                                        </div>
                                    </div>
                                    <div class="element-top">
                                        <img src="{{asset('assets/images/slider/flower-element-1.svg')}}" class="element-img element-img-lg">
                                    </div>
                                    <div class="element-bottom">
                                        <img src="{{asset('assets/images/slider/flower-element-2.svg')}}" class="element-img element-img-lg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="slider-nav">
            <a href="#" class="slick-slider slick-prev"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
            <a href="#" class="slick-slider slick-next"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        </div>
    </section>
    <section class="section mb-5 mb-xl-100">
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-4 mb-3 mb-md-0">
                    <div class="box d-flex h-100 text-sm-center text-xl-left">                      
                        <div class="row align-items-center">
                            <div class="col-auto col-sm-12 col-xl-auto mb-3 mb-xl-0">
                                <img src="{{asset('assets/images/icons/dostava-icon.svg')}}" class="icon icon-md">
                            </div>
                            <div class="col col-sm-12 col-xl">
                                <h5 class="h4 h4-to-h6-md h4-to-h6-sm h4-to-h6 box-text mb-2 mb-xl-3">{!!trans('index.b_1')!!}</h5>
                                <p class="text-dark-light mb-0">{{trans('index.b_1_p')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 mb-3 mb-md-0">
                    <div class="box d-flex h-100 text-sm-center text-xl-left">
                        <div class="row align-items-center">
                            <div class="col-auto col-sm-12 col-xl-auto mb-3 mb-xl-0">
                                <img src="{{asset('assets/images/icons/dezinfekcija-icon.svg')}}" class="icon icon-md">
                            </div>
                            <div class="col col-sm-12 col-xl">
                                <h5 class="h4 h4-to-h6-md h4-to-h6-sm h4-to-h6 box-text mb-2 mb-xl-3">{!!trans('index.b_2')!!}</h5>
                                <p class="text-dark-light mb-0">{!!trans('index.b_2_p')!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="box d-flex h-100 text-sm-center text-xl-left">
                        <div class="row align-items-center">
                            <div class="col-auto col-sm-12 col-xl-auto mb-3 mb-xl-0">
                                <img src="{{asset('assets/images/icons/poddrska-icon.svg')}}" class="icon icon-md">
                            </div>
                            <div class="col col-sm-12 col-xl">
                                <h5 class="h4 h4-to-h6-md h4-to-h6-sm h4-to-h6 box-text mb-2 mb-xl-3">{!!trans('index.b_3')!!}</h5>
                                <p class="text-dark-light mb-0">{!!trans('index.b_3_p')!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(isset($promo_prod))
    <section class="bg-primary mb-5 py-5 py-xl-100 mb-lg-100">
        <div class="container">
            <div class="mb-4 mb-md-5 mb-xl-50">
               <h4 class="h4 text-center text-red font-weight-bold mb-2 text-uppercase">{{$promo_prod->getproduct->name}}</h4>
                <h2 class="h1 text-center font-weight-bold">{{$promo_prod->title}}</h2>
            </div>
            <div class="row align-items-lg-center justify-content-center mb-lg-5 mb-xl-50">
                <div class="col-sm-10 col-md-4 col-lg-4 order-2 order-md-1">                        
                    <div class="mb-3 mb-md-4">
                        <div class="text-lg-right">
                            <h4 class="h3 h3-to-h5-sm font-weight-bold mb-lg-3">{{$promo_prod->title_l_1}}</h4>
                            <p class="text-dark-light mb-0">{{$promo_prod->text_l_1}}</p>
                        </div>
                        <hr class="mt-3 mt-md-4 mb-0">
                    </div>
                    <div class="mb-3 mb-md-4 mb-lg-0">
                        <div class="text-lg-right">
                            <h4 class="h3 h3-to-h5-sm font-weight-bold mb-lg-3">{{$promo_prod->title_l_2}}</h4>
                            <p class="text-dark-light mb-0">{{$promo_prod->text_l_2}}</p>
                        </div>
                        <hr class="d-lg-none mt-3 mt-md-4 mt-lg-0 mb-0">
                    </div>
                </div>
                <div class="col-10 col-sm-8 col-md-4 col-lg-4 d-flex align-items-center order-1 order-md-2 mb-4">
                    <img src="{{asset('images/icons/spin.gif')}}" data-src="{{checkifhasimage($promo_prod->image)}}" alt="" class="w-100 lazy">
                </div>
                <div class="col-sm-10 col-md-4 col-lg-4 order-2 order-md-3">
                    <div class="mb-3 mb-md-4">
                        <div class="">
                            <h4 class="h3 h3-to-h5-sm font-weight-bold mb-lg-3">{{$promo_prod->title_r_1}}</h4>
                            <p class="text-dark-light mb-0">{{$promo_prod->text_r_1}}</p>
                        </div>
                        <hr class="mt-3 mt-md-4 mb-0">
                    </div>
                    <div class="">
                        <div class="">
                            <h4 class="h3 h3-to-h5-sm font-weight-bold mb-lg-3">{{$promo_prod->title_r_2}}</h4>
                            <p class="text-dark-light mb-0">{{$promo_prod->text_r_2}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-wrapper text-center mt-4 md-md-5 mt-lg-0">
                <a href="{{route('shop.product.view',array('slug'=>$promo_prod->getproduct->slug))}}" class="btn btn-secondary btn-arrow">{{trans('global.findoutmore')}}</a>
            </div>
        </div>
    </section>
    @endif


    <section class="section product-section elements mb-5 mb-xl-100">
        <div class="element-top">
            <img src="{{asset('assets/images/flower-element-1-left.svg')}}" class="element-img element-img-lg">
        </div>
        <div class="element-bottom">
            <img src="{{asset('assets/images/flower-element-2-right.svg')}}" class="element-img element-img-lg">
        </div>
        <div class="container position-relative mb-5">
            <h1 class="h1 text-center font-weight-bold mb-4 mb-md-5">{{trans('global.naturarecomendedpackages')}}</h1>
            <div id="products-carousel-1" class="products-carousel products-row dots-style-1 mb-5 pb-2 justify-content-center">

        @foreach($packages as $kpack => $vPack)
        <div class="product-col">
                <div class="box-product bg-light product-animation h-100">
                        
            
                        <a href="{{route('shop.package.view',array('slug' => $vPack->slug))}}" class="link link-dark">
                            @if(getfinalprice($vPack->minimal_price,$vPack->discounted_price,$vPack->discount_status,$vPack->discount_from_date,$vPack->discount_to_date,$vPack->discount_permanent_yesno,$vPack->discount_kolicina,$vPack->discount_kolicina_nolimit,trans('general.currency')) != $vPack->minimal_price)
                        <div class="product-badge badge badge-promotion text-uppercase">{{trans('global.akciskaponuda')}}</div>
                    @endif

                                            <div class="animation-content mb-3">
                    <div class="img-wrapper product-img-wrapper justify-content-center">
                                                <img src="{{featured_image_v2($vPack->id,$vPack->featured_image,'sm')}}" class="img-fluid mb-4" alt="">
                                            </div>
                    <div class="text-center">
                        <p class="h5 product-title-1 font-weight-bold">{{$vPack->name}}</p>

                            @if(getfinalprice($vPack->minimal_price,$vPack->discounted_price,$vPack->discount_status,$vPack->discount_from_date,$vPack->discount_to_date,$vPack->discount_permanent_yesno,$vPack->discount_kolicina,$vPack->discount_kolicina_nolimit,trans('general.currency')) != $vPack->minimal_price)

                                <p class="h6 product-title-2 text-sm font-weight-bold mb-2"><span class="text-del">{{$vPack->minimal_price}} {{trans('general.currency')}}.</span></p>
                            @endif


                        <p class="h6 product-title-2 text-sm text-red font-weight-bold mb-0"><span class="text-addon">{{trans('global.foronly')}}</span> {{displayfinalprice($vPack->minimal_price,$vPack->discounted_price,$vPack->discount_status,$vPack->discount_from_date,$vPack->discount_to_date,$vPack->discount_permanent_yesno,$vPack->discount_kolicina,$vPack->discount_kolicina_nolimit,trans('general.currency'))}}.</p>
                    </div>
                </div>
            </a>

            <div class="button-wrapper">
                <a href="{{route('shop.package.view',array('slug' => $vPack->slug))}}" class="btn btn-secondary btn-icon"><i class="fa fa-shopping-cart mr-2"></i><span>{{trans('global.order')}}</span></a>
            </div>

            
        </div>
    </div>
    @endforeach

      
    </div>          <div class="btn-wrapper text-center">
                <a href="{{route('shop.packages')}}" class="btn btn-secondary btn-arrow">{{trans('global.allpackages')}}</a>
            </div>
        </div>
    </section>
    <section class="bg-primary py-5 py-xl-100">
        <div class="container">
            <h1 class="h1 text-center font-weight-bold mb-4 mb-md-5">{{trans('global.naturaproducts')}}</h1>

<div class="row products-row mb-4">

    @foreach($products_home as $kk=>$v)
        <div class="product-col col-6 col-md-4 col-lg-3 mb-3 mb-lg-5">
                <div class="box-product bg-white product-animation h-100">
            
             <a href="{{route('shop.product.view',array('slug' => $v->slug))}}" class="link link-dark">

                @if(getfinalprice($v->price,$v->discounted_price,$v->discount_status,$v->discount_from_date,$v->discount_to_date,$v->discount_permanent_yesno,$v->discount_kolicina,$v->discount_kolicina_nolimit,trans('general.currency')) != $v->price)
                        <div class="product-badge badge badge-promotion text-uppercase">{{trans('global.akciskaponuda')}}</div>
                    @endif

                <div class="animation-content mb-3">
                    <div class="img-wrapper product-img-wrapper justify-content-center">
                           <img src="{{asset('images/icons/spin.gif')}}" data-src="{{featured_image_v2($v->id,$v->featured_image,'xs')}}" class="img-fluid mb-4 lazy" alt="" /> 
                    </div>
                    <div class="text-center">
                        <p class="h5 product-title-1 font-weight-bold">{{$v->name}}</p>
                         
                         @if(getfinalprice($v->price,$v->discounted_price,$v->discount_status,$v->discount_from_date,$v->discount_to_date,$v->discount_permanent_yesno,$v->discount_kolicina,$v->discount_kolicina_nolimit,trans('general.currency')) != $v->price)

                                <p class="h6 product-title-2 text-sm font-weight-bold mb-2"><span class="text-del">{{$v->price}} {{trans('general.currency')}}.</span></p>
                            @endif
                         <p class="h6 product-title-2 text-sm text-red font-weight-bold mb-0"><span class="text-addon">{{trans('global.foronly')}}</span> {{displayfinalprice($v->price,$v->discounted_price,$v->discount_status,$v->discount_from_date,$v->discount_to_date,$v->discount_permanent_yesno,$v->discount_kolicina,$v->discount_kolicina_nolimit,trans('general.currency'))}}</p>
                    </div>
                </div>              
            </a>
            <div class="button-wrapper">
                <a href="{{route('shop.product.view',array('slug' => $v->slug))}}" class="btn btn-secondary btn-icon"><i class="fa fa-shopping-cart mr-2"></i><span>{{trans('global.order')}}</span></a>
            </div>
            
        </div>
    </div>  
    @endforeach
        
    
    </div>
            <div class="btn-wrapper text-center">
                <a href="{{route('shop.products')}}" class="btn btn-secondary btn-arrow">{{trans('global.allproducts')}}</a>
            </div>
        </div>
    </section>
    <section class="banner-section">
        <div class="banner bg-image bg-image-hide-sm py-5 py-lg-100" style="background-image:url({{asset('assets/images/naucno-dokazano-bg.jpg')}})">
            <div class="banner-subbanner overlay-primary d-sm-none" style="background-image:url({{asset('assets/images/banners/sidebanner.png')}});background-position: center bottom;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-5">
                        <h2 class="h1 font-weight-bold mb-4 mb-lg-5">{{trans('index.naucnodokazano')}}</h2>
                        {!!trans('index.naucnodokazano_p')!!}
                        <div class="img-wrapper mb-4 mb-lg-5">
                            <img src="{{asset('assets/images/potpis-drvoshanski.png')}}" class="signature signature-md" alt="">
                        </div>
                        <a href="{{route('shop.blog')}}" class="btn btn-secondary btn-arrow">{{trans('global.findoutmore')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-primary py-5 py-xl-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <h2 class="h1 text-center font-weight-bold mb-lg-5">{{trans('index.experience_users')}}</h2>
                    <div id="testemonials-slider" class="testimonials-quote dots-style-1 px-4 pt-4">
                        <div>
                            <p class=" text-center">{!!trans('index.experience_p_1')!!}</p>
                            <div class="text-center mt-4">
                                <img src="{{asset('assets/images/testimonials/sefije-selmani.jpg')}}" alt="" class="rounded-circle user-img mb-4">
                                <p class="h6 text-center text-uppercase user-name">{{trans('index.experience_1')}}</p>
                                <p class="h6 text-center user-status"><i>{{trans('index.happyuser')}}</i></p>
                            </div>
                        </div>
                        <div>
                            <p class=" text-center">{!!trans('index.experience_p_2')!!}</p>
                            <div class="text-center mt-4">
                                <img src="{{asset('assets/images/testimonials/stanka-kuc.jpg')}}" alt="" class="rounded-circle user-img mb-4">
                                <p class="h6 text-center text-uppercase user-name">{{trans('index.experience_2')}}</p>
                                <p class="h6 text-center user-status"><i>{{trans('index.happyuser')}}</i></p>
                            </div>
                        </div>
                        <div>
                            <p class=" text-center">{!!trans('index.experience_p_3')!!}</p>
                            <div class="text-center mt-4">
                                <img src="{{asset('assets/images/testimonials/zora-mladenovska.jpg')}}" alt="" class="rounded-circle user-img mb-4">
                                <p class="h6 text-center text-uppercase user-name">{{trans('index.experience_3')}}</p>
                                <p class="h6 text-center user-status"><i>{{trans('index.happyuser')}}</i></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection