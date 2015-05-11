<html>
<head>
    <title>@yield('title')</title>
    @if(Auth::check())
      {{ Auth::user()->username }}
      {{ link_to_route('user.logout', 'Sign Out') }}
    @else
    
    {{Session::get('login_error')}}
    
    {{ Form::open(array('url'=>secure_url('user/login'))) }}
      {{ Form::label('username','User Name:') }}
      {{ Form::text('username') }}
      {{ Form::label('password','Password:') }}
      {{ Form::password('password') }}
      {{ Form::submit('Sign in') }}
      {{ link_to_route('user.create', 'Sign Up') }}
    {{ Form::close() }}
    
   
    @endif
    
    
</head>

<body>
  @section('content')
  @show
</body>
</html>