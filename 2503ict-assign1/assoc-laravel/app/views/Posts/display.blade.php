@extends('layouts.master')


@section('header')


    <h1>Timeline</h1>



@stop

@section('sidepane')

<h3>Create Post</h3>

    @if($success != true)
    
        <div class='panel-group'>
            <div class='panel panel-danger'>
              <div class='panel-heading'>COULD NOT CREATE POST</div>
              <div class='panel-body'>Ensure all fields are entered.</div>
              
            </div>
       
        </div>
    
    @endif
    
<form method="post" action="add_post_action">
    <label for='name'>UserName:</label> 
        <input class="form-control" type = 'text' name = 'name'>
    <label for='title'>Title:</label> 
        <input class="form-control" type = 'text' name = 'title'>
    <label for='msgpost'>What's on your mind?</label></label> 
        <textarea class="form-control" name="msgpost" rows='4'cols='16'></textarea>
        <br>
    <button class="btn btn-primary btn-block">Post</button>
    
  
    
    
    
</form>

@stop

@section('content')

@foreach( $posts as $ps)
  
<div>
    <div class="editDeleteGroup">
        <div class="btn-group">
            <a class="btn btn-warning btn-xs" href="{{{ url("update_post/$ps->id") }}}">Edit</a>
            <a class="btn btn-danger btn-xs" href="{{{ url("delete_post_action/$ps->id") }}}">Delete</a>
        </div>
    </div>
            <div class="panel-group">
                  <div class="panel panel-primary">
                    <img class="photo" src="{{{ $ps->profile }}}">
                    <div class="panel-heading">{{{ $ps->title }}}</div>
                    <div class="panel-body">{{{ $ps->message }}}</div>
                    <div class="panel panel-success">{{{ $ps->user }}}  <a class="btn btn-link btn-xs" href="{{{ url("view_comments/$ps->id") }}}">View Comments <span class="badge">{{{ $count[$ps->id] }}}</span> </a>
                    </div>
                </div>
            </div>
</div>

@endforeach

@stop




