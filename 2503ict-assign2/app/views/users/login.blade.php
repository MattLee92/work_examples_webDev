@extends('layouts.master')


@section('header')


    <h1>Login</h1>



@stop

@section('sidepane')



    

@stop

@section('content')


 @if(Auth::check())
      {{ Auth::user()->username }}
      {{ link_to_route('user.logout', 'Sign Out') }}
    @else
    
   <p style = 'color:Red'> {{Session::get('login_error')}} </p>
    
    {{ Form::open(array('url'=>secure_url('user/login'))) }}
      {{ Form::label('username','User Name:') }}
      {{ Form::text('username') }}
      {{ Form::label('password','Password:') }}
      {{ Form::password('password') }}
      {{ Form::submit('Sign in') }}
      {{ link_to_route('user.create', 'Sign Up') }}
    {{ Form::close() }}
    
   
    @endif



@stop




