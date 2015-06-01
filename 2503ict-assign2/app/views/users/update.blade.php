@extends('layouts.master')

{{ HTML::style('css/wp.css') }}

@section('header')


    <h1>Update User</h1>



@stop

@section('sidepane')



    

@stop

@section('content')


    {{ Form::model($user, array('method' => 'PUT', 'files' => 'true', 'route' => array('user.update', $user->id))) }}

    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email', Auth::user()->email, ['class' => 'form-control', 'readonly']) }}
    @if($errors->first('email') != null)
    <div class="panel panel-danger">
      <div class="panel-heading">{{ $errors->first('email') }}</div>
    </div>
    @endif
    <p></p>
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->first('name') != null)
    <div class="panel panel-danger">
      <div class="panel-heading">{{ $errors->first('name') }}</div>
    </div>
    @endif
    <p></p>
    {{ Form::label('password', 'Enter Password:') }}
    {{ Form::password('password', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('passwordcon', 'Cofirm Password:') }}
    {{ Form::password('passwordcon', ['class' => 'form-control']) }}
    @if($errors->first('password') != null)
    <div class="panel panel-danger">
      <div class="panel-heading">{{ $errors->first('password') }}</div>
    </div>
    @endif
    <p></p>
    {{ Form::label('dob', 'Enter Date of Birth:') }}
    <p></p>
    {{ Form::label('day', 'Day:') }}
    {{ Form::selectRange('day', 1, 31, null, ['class' => 'form-control']) }}

    {{ Form::label('month', 'Month:') }}
    {{ Form::selectMonth('month', null, ['class' => 'form-control']) }}
    
    {{ Form::label('year', 'Year:') }}
    {{ Form::selectRange('year', 1901, 2015, null, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('image', 'Profile Image:') }}
    {{ Form::file('image', null, ['class' => 'btn btn-primary btn-block']) }}
    <p></p>
    {{ Form::submit('Save', array('class' => 'btn btn-primary btn-block')) }}

    {{ Form::close() }}



@stop




