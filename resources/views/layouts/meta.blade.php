<title>@yield('meta_og_title') | {{config('app.name')}}</title>
<META name="robots" content="@yield('meta_robots')">
<!--<META name="robots" content="noindex, nofollow">-->
<meta name="description" content="@yield('meta_og_description')">
<meta name="keywords" content="@yield('meta_keywords')">
<meta http-equiv="content-language" name="locale" content="{{App::getLocale()}}" />        
<!-- Google Authorship and Publisher Markup -->
<link rel="author" href="https://plus.google.com/{{ Lang::get('homepage.google') }}/posts"/>
<link rel="publisher" href="https://plus.google.com/{{ Lang::get('homepage.google') }}"/>
        
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="@yield('meta_og_title')">
<meta itemprop="description" content="@yield('meta_og_description')">
<meta itemprop="image" content="@yield('meta_og_image')">
        
<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="{{ '@' }}{{ Config::get('app.twitter') }}">
<meta name="twitter:title" content="@yield('meta_og_title')">
<meta name="twitter:description" content="@yield('meta_og_description')">
<meta name="twitter:creator" content="{{ '@' }}{{ Config::get('app.twitter') }}">
<meta name="twitter:image:src" content="@yield('meta_og_image')">
<!-- Twitter Summary card images must be at least 200x200px -->
        
<!-- Open Graph data -->
<meta property="og:image" content="@yield('meta_og_image')" />
<meta property="og:image:width" content="@yield('meta_og_image_w')"/>
<meta property="og:image:height" content="@yield('meta_og_image_h')"/>
<meta property="og:title" content="@yield('meta_og_title')" />
<meta property="og:description" content="@yield('meta_og_description')" />
<meta property="og:site_name" content="{{ Lang::get('global.sitename') }}" />
<meta property="og:type" content="website"/>
<meta property="og:url" content="{{ Request::fullUrl() }}"/>
<meta property="fb:app_id" content="" />