@extends('layouts.master')


@section('header')

<h1>Edit Post</h1>

@stop

@section('sidepane')



@stop

@section('content')

{{ Form::model($post, array('method' => 'PUT', 'route' => array('post.update', $post->id))) }}

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
{{ Form::submit('Save', array('class' => 'btn btn-primary btn-block')) }}

{{ Form::close() }}




 
@stop






