@extends('layouts.master')

{{ HTML::style('css/wp.css') }}

@section('sidepane')

<div class="panel-group">
    <div class="panel panel-primary">
        <img class="photo" src="{{ asset($user->image->url('thumb')) }}">
        <div class="panel-heading">{{{ $user->fullname }}}<p>{{{ $age  }}}</p></div>
        <div class="panel-body">{{{ $user->email }}}</div>
        @if(Auth::check())
        
            @if($friends == 0)
                {{ Form::open(['method' => 'POST', 'action' => ['FriendsUserController@store']]) }}
                {{ Form::hidden('adder_id', Auth::user()->id) }}
                {{ Form::hidden('friend_id', $user->id) }}
                <button type="submit" class="btn btn-success btn-xs">Add Friend</button>
                {{Form::close() }}
            @else
                {{ Form::open(['method' => 'DELETE', 'action' => ['FriendsUserController@destroy', Auth::user()->id]]) }}
                {{ Form::hidden('friend_id', $user->id) }}
                <button type="submit" class="btn btn-danger btn-xs">Remove Friend</button>
                {{Form::close() }}
            @endif
           
        @endif
        
        <li> {{ link_to_route('friend.show', 'View Friends', array($user->id)) }}</li>
    </div>
</div>
    
    <div>
        
    </div>
    


@stop

@section('content')

<h3>Profile</h3>

@foreach( $posts as $ps)


        
        <div>
            <div>
            @if(Auth::check())
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
                        <img class="photo" src="{{ asset($user->image->url('thumb')) }}">
                        <div class="panel-heading">{{{ $ps->title }}}</div>
                        <div class="panel-body">{{{ $ps->message }}}</div>
                        <div class="panel panel-success">{{{ $ps->user_id }}} 
                        <li class="btn btn-success btn-xs">{{ link_to_route('comment.show', 'View Comments', array($ps->id)) }}</li>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
     
    
  
@endforeach

@stop