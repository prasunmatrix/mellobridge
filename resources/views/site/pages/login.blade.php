@section('title', $page_title)
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

<body class="login">

<!--...............logo section........................-->
<div class="wrapper">
<div class="top-header">
<div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('site/assets/images/MelloBridge.svg') }}" alt="" title=""/></a></div>

</div>
</div>
<!--...............logo section........................-->

<!--...............login section........................-->

<div class="login-area">
    <h1>Sign into your account</h1>
    <h2>Not a member?  <a href="{{url('/signup')}}">Sign Up</a></h2>
      @if(count($errors) > 0)
        <div class="alert alert-danger alert-dismissable">
            @foreach ($errors->all() as $error)
                <span style="color:red;">{{ $error }}</span><br/>
            @endforeach
        </div>
      @endif
      @if(Session::has('success'))
          <div class="alert alert-success alert-dismissable __web-inspector-hide-shortcut__">              
              <span style="color:green;">{{ Session::get('success') }}</span>
          </div>
      @endif
      @if(Session::has('error'))
          <div class="alert alert-danger alert-dismissable">              
              <span style="color:red;">{{ Session::get('error') }}</span>
          </div>
      @endif
    <div class="login-box">
        <form method="post" action="{{ route('verifylogin') }}" id="login_table" >
          <input type="hidden" value="<?=csrf_token()?>" name="_token">
            <div class="row">
                <div class="col">
                    <input type="text" name="email" id="email" value="{{old('email',$log_data['email'])}}" required placeholder="Email"/>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="password" name="password"value="{{$log_data['password']}}"  id="password" required placeholder="Password"/>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input type="checkbox" id="remember" @if(!empty($log_data['email']) && !empty($log_data['password']) ) checked="checked" @endif name="remember_me">
                        <label for="remember">Remember me</label>
                      
                      </div>
                      
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                    <a href="{{url('/forgot-password')}}">Forgot Password</a>
                      
                      </div>
                      
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="submit" value="Sign In"/>
                </div>
            </div>
            
            
        </form>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('site/assets/js/jquery.slimmenu.min.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="{{ asset('site/assets/js/custom.js') }}"></script>

</body>
</html>
