@extends('layouts.master')

{{ HTML::style('css/wp.css') }}


@section('sidepane')

@stop






@section('content')

<h3>Friends</h3>

<ul>
@foreach( $friends as $friend)

<li>{{{ $friend->user_id }}}</li>

@endforeach
</ul>


@stop