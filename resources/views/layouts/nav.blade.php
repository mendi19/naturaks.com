 <header class="one-edge-shadow">
    <div class="header-top d-none d-md-block bg-primary py-2">
        <div class="container">
            <ul class="list-inline text-right mb-0">
                <li class="list-inline-item mr-2 mr-md-3 mr-xl-4 float-left">
                    {{trans('global.fororedersafteramountisfree')}}
                </li>
                <li class="list-inline-item"></li>
                <li class="list-inline-item mr-2 mr-md-3 mr-xl-4">
                    <a href="mailto:contact@naturatherapy.mk" class="link link-dark"><i class="fa fa-envelope-o text-green mr-2" aria-hidden="true"></i>contact@naturatherapy.mk</a>
                </li>
                <li class="list-inline-item ">
                    <a href="tel:+389 70 230 720" class="link link-dark font-weight-medium"><i class="fa fa-phone text-green mr-2" aria-hidden="true"></i>{{trans('global.orderon')}}: +389 70 230 720</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <nav class="navbar row navbar-expand-lg navbar-light navbar-bg-color align-items-md-center px-0">
            <div class="col order-1 order-lg-1">
                <a class="navbar-brand mx-0" href="{{route('shop.index')}}">
                    <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="Logo">
                </a>
            </div>
            <div class="col-lg-auto order-3 order-lg-2">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-lg-auto">
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="{{route('shop.about')}}">{{trans('global.aboutus')}}</a>
                        </li>
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="{{route('shop.products')}}">{{trans('global.products')}}</a>
                        </li>
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="{{route('shop.packages')}}">{{trans('global.packages')}}</a>
                        </li>
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="{{route('shop.nutrigenetika')}}">{{trans('nutrigenist.nutrigenist')}}</a>
                        </li>
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="{{route('shop.blog')}}">{{trans('global.naucnodokazano')}}</a>
                        </li>
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="{{route('shop.careers')}}">{{trans('global.career')}}</a>
                        </li>
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="{{route('shop.faq')}}">{{trans('faq.faq')}}</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav d-md-none mt-auto mb-0">
                        <li class="nav-item">
                            <hr class="my-3">
                        </li>
                        <li class="nav-item">
                            <a href="mailto:contact@naturatherapy.mk" class="nav-link"><i class="fa fa-envelope-o text-green mr-2" aria-hidden="true"></i>contact@naturatherapy.mk</a>
                        </li>
                        <li class="nav-item">
                            <a href="tel:+389 70 230 720" class="nav-link font-weight-medium"><i class="fa fa-phone text-green mr-2" aria-hidden="true"></i>Нарачајте на: +389 70 230 720</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col order-2 order-lg-3">
                <ul class="list-inline shop-controls text-right mb-0">
                    
                    <li class="list-inline-item">
                        <a href="{{route('shop.cart')}}" class="shop-control">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="badge badge-primary data-cart-items-nr" data-cart-items>0</span>
                        </a>
                        
                    </li>
                    <li class="list-inline-item d-inline-block d-lg-none">
                        <button class="navbar-toggler shop-control" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <img src="{{asset('assets/images/menu.svg')}}" class="hamburger-menu-icon">
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>