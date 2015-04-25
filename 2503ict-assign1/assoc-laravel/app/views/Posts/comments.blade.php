@extends('layouts.master')

{{ HTML::style('css/wp.css') }}

@section('header')

<h1>View Comments</h1>

@stop
                    {{--<img class="photo" src="{{{ $post[0]->profile }}}">--}}



@section('sidepane')

<h3>Add Comment</h3>
  
<form method="post" action="{{{ url("add_comment_action") }}}"">
      <input type="hidden" name="id" value="{{{ $post[0]->id }}}"/>
      <label for='name'>UserName:</label>
      <input class="form-control" type = 'text' name = 'name'>
     <label for='msgpost'>Comment for post:</label> 
      <textarea class="form-control"name="msgpost" rows='4'cols='16'></textarea><br>
      <button class="btn btn-primary btn-block" type="submit">Post Comment</button>
</form>

@stop

@section('content')

  <div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">{{{ $post[0]->title }}}</div>
      <div class="panel-body">{{{ $post[0]->message }}}</div>
      <div class="panel panel-success">{{{ $post[0]->user }}}</div>
    </div>
  </div>

@foreach( $comm as $cm)

    <div class="panel-group">
      <div class="editDeleteGroup">
        <a class="btn btn-danger btn-xs"  href="{{{ url("delete_comment_action/$cm->c_id") }}}" >Delete</a>
      </div>
      
      <div class="panel panel-info">
        <div class="panel-body">{{{ $cm->message }}}</div>
        <div class="panel panel-success">{{{ $cm->user }}}</div>
      </div>
    </div>
@endforeach

@stop


