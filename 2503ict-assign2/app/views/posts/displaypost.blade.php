@extends('layouts.master')


@section('header')


    <h1>Timeline</h1>
 

@stop

@section('sidepane')






 @if(Auth::check())
      
      <h3>User: {{{ Auth::user()->fullname }}}</h3>
        <li class="btn btn-success btn-block">{{ link_to_route('user.edit', 'Edit Details', array(Auth::user()->id)) }}</li>
        <li class="btn btn-danger btn-block">{{ link_to_route('user.logout', 'Sign Out') }}</li>
     
      
      
<h3>Create Post</h3>


  {{ Form::open(array('action' => 'PostController@store')) }}
  

    {{ Form::hidden('id', Auth::user()->id) }}
  
  
    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
    @if($errors->first('title') != null)
    <div class="panel panel-danger">
      <div class="panel-heading">{{ $errors->first('title') }}</div>
    </div>
    @endif
    <p></p>
    {{ Form::label('message', 'Message:') }}
    {{ Form::textarea('message', null, ['class' => 'form-control']) }}
    @if($errors->first('message') != null)
    <div class="panel panel-danger">
      <div class="panel-heading">{{ $errors->first('message') }}</div>
    </div>
    @endif
    <p></p>
    {{ Form::label('privacy', 'Privacy Level:') }}
    {{ Form::select('privacy_level', array('Public' => 'Public', 'Friends' => 'Friends', 'Private' => 'Private'), null, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::submit('Post', array('class' => 'btn btn-primary btn-block')) }}

    {{ Form::close() }}
    


    @else
    
    <h3>Login</h3>
   <p style = 'color:Red'> {{Session::get('login_error')}} </p>
    
    {{ Form::open(array('url'=>secure_url('user/login'))) }}
      {{ Form::label('email','Email:') }}
      {{ Form::text('email', null, ['class' => 'form-control']) }}
      <p></p>
      {{ Form::label('password','Password:') }}
      {{ Form::password('password', ['class' => 'form-control']) }}
      <p></p>
      {{ Form::submit('Log in', array('class' => 'btn btn-primary btn-block')) }}
      <li class="btn btn-success btn-block">{{ link_to_route('user.create', 'Sign Up') }}</li>
    {{ Form::close() }}
    
   
    @endif

<h3>Search User</h3>
 {{ Form::open(array('action' => 'UserController@search')) }}

  {{ Form::label('srch', 'Search Users:') }}
  {{ Form::text('srch', null, ['class' => 'form-control']) }}
  <p></p>  
  {{ Form::submit('Search', array('class' => 'btn btn-primary btn-block')) }}

  {{ Form::close() }}
                  
                  



@stop

@section('content')

@foreach( $posts as $ps)
<div>

            @if (Auth::check())
            @if(Auth::user()->id == $ps->user_id)
            
                <div class="editDeleteGroup">
        <div class="btn-group">
            <li class="btn btn-warning btn-xs">{{ link_to_route('post.edit', 'Edit', array($ps->id)) }}</li>
            {{ Form::open(['method' => 'DELETE', 'action' => ['PostController@destroy', $ps->id]]) }}
            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
            {{Form::close() }}
              </div>
                </div>
            @endif
            @endif
                <div class="panel-group">
                  <div class="panel panel-primary">
                    <img class="photo" src="{{{ $ps->profile }}}">
                    <div class="panel-heading">{{{ $ps->title }}}</div>
                    <div class="panel-body">{{{ $ps->message }}}</div>
                    
                    <div class="panel panel-success">{{{ $ps->users }}} 
                        <li class="btn btn-success btn-xs">{{ link_to_route('comment.show', 'View Comments', array($ps->id)) }}</li>
           
                    </div>
                </div>
            </div>            
 
</div>

@endforeach

@stop




