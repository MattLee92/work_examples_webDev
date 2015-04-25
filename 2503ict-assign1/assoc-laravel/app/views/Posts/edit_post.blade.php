@extends('layouts.master')

{{ HTML::style('css/wp.css') }}
@section('header')

<h1>Edit Post</h1>

@stop

@section('sidepane')


@stop

@section('content')

<form method="post" action="{{{ url('update_post_action') }}}">
        <input type="hidden" name="id" value="{{{ $post[0]->id }}}"> 
    <label for='name'>UserName:</label> 
        <input class="form-control" type = 'text' name = 'name' readonly value="{{{ $post[0]->user }}}"><br>
    <label for='title'>Title:</label> 
        <input class="form-control" type = 'text' name = 'title' value="{{{ $post[0]->title }}}"><br>
    <label for='msg'>What's on your mind?</label></label> 
        <textarea class="form-control" name="msg" rows='4'cols='16'>{{{ $post[0]->message }}}</textarea>
    <br>
    <div class="btn-group">
        <input class="btn btn-primary btn-lg" type="submit" value="Save Post">
            <form action="{{{ url('/') }}}">
   <input class="btn btn-warning btn-lg" type="submit" readonly  value="Cancel" >
</form>
   </div>
</form> 

 
@stop






