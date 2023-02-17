<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="{{ asset('site/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('site/assets/css/responsive.css') }}" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="{{ asset('site/assets/images/favicon.png') }}" type="image/x-icon">
<!-- slim menu -->
<link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/slimmenu.min.css') }}">

</head>
@if(Route::currentRouteName()=='homepage')
<body>
@else  
<body class="prohibited">
@endif    

<!--...............logo section........................-->
<div class="wrapper">
<div class="top-header">
<div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('site/assets/images/MelloBridge.svg') }}" alt="" title=""/></a></div>

<div class="nav">
  <ul class="slimmenu">
    <li>
        <a href="{{ url('/how-its-work') }}">How it Works</a>
    </li>
    <li><a href="homepage#calculator" class="scrollTo">Pricing</a></li>
    <!-- <li>
        <a href="#">Services</a>
    </li> -->
    <li><a href="{{ url('/location') }}">Locations</a></li>
    <li><a href="{{ url('/public-tracking') }}">Track Shipments</a></li>
    <li><a href="#">More</a>
      <ul>
        <li>
            <a href="{{ url('/how-its-work') }}">How it Works</a>
        </li>
        {{--<li><a href="homepage#calculator">Pricing</a></li>--}}
        <li><a href="{{ url('/prohibited-items') }}">Prohibited Items</a></li>
        <li><a href="{{ url('/insurance') }}">Insurance</a></li>
        
        <!-- <li>
            <a href="#">Services</a>
        </li> -->
       {{-- <li><a href="{{ url('/location') }}">Locations</a></li>--}}
        {{--<li><a href="#">More</a></li>--}}
      </ul>
    </li>
    <li><a href="{{ url('/contact-us') }}">Contact</a></li>
    @if(Auth::guard('frontenduser')->check())
    <li class="signup">
      <a href="{{ url('/dashboard') }}">Dashboard</a>
    </li>
    @else
    <li class="loginmenu">
      <a href="{{ url('/login') }}">Log In</a>
    </li>
    <li class="signup">
      <a href="{{ url('/signup') }}">Sign Up</a>
    </li>
    @endif
</ul>
</div>
<div class="logbt">
  <ul>
    @if(Auth::guard('frontenduser')->check())
    <li class="signup">
      <a href="{{ url('/dashboard') }}">Dashboard</a>
    </li>
    @else
    <li>
      <a href="{{ url('/login') }}">Log In</a>
    </li>
    <li class="signup">
      <a href="{{ url('/signup') }}">Sign Up</a>
    </li>
    @endif
  </ul>
</div>

</div>
</div>
<!--...............logo section........................-->