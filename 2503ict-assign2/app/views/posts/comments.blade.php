@extends('layouts.master')

{{ HTML::style('css/wp.css') }}

@section('header')

<h1>View Comments</h1>

@stop



@section('sidepane')


@if(Auth::check())

<h3>Add Comment</h3>
  
  {{ Form::open(array('action' => 'CommentController@store')) }}
  

  {{ Form::hidden('id', Auth::user()->id) }}
  {{ Form::hidden('post_id', $post->id) }}
  
  {{ Form::label('email', 'Email:') }}
  {{ Form::text('email', Auth::user()->email, ['class' => 'form-control', 'readonly']) }}
  <p></p>
  {{ Form::label('message', 'Message:') }}
  {{ Form::textarea('message', null, ['class' => 'form-control']) }}
  @if($errors->first('message') != null)
    <div class="panel panel-danger">
      <div class="panel-heading">{{ $errors->first('message') }}</div>
    </div>
    @endif
  <p></p>
  {{ Form::submit('Comment', array('class' => 'btn btn-primary btn-block')) }}

  {{ Form::close() }}

@endif



@stop

@section('content')

  <div class="panel-group">
    <div class="panel panel-primary">
      
      <div class="panel-heading">{{{ $post->title }}}</div>
      <div class="panel-body">{{{ $post->message }}}</div>
      <div class="panel panel-success">{{{ $post->user_id }}}</div>
    </div>
  </div>



@foreach( $comments as $cm)


    <div class="panel-group">
      @if(Auth::user()->id == $cm->user_id)
      <div class="editDeleteGroup">
            {{ Form::open(['method' => 'DELETE', 'action' => ['CommentController@destroy', $cm->id]]) }}
            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
            {{Form::close() }}
      </div>
      @endif
      
      <div class="panel panel-info">
        <div class="panel-body">{{{ $cm->message }}}</div>
        <div class="panel panel-success">{{{ $cm->user_id }}}</div>
      </div>
    </div>
@endforeach

{{ $comments->links() }}
@stop