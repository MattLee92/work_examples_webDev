@extends('layouts.master')

{{ HTML::style('css/wp.css') }}

@section('sidepane')


@stop

@section('content')

<h3>Searching for users matching: {{{ $srch }}} </h3>

@foreach( $searchRes as $use)

    
    <div class="panel-group">
    <div class="panel panel-primary">
        <img class="photo" src="{{ asset($use->image->url('thumb')) }}">
        <div class="panel-heading">{{{ $use->fullname }}}</div>
        <div class="panel-body">{{ link_to_route('user.show', 'View Profile' , array($use->id)) }}</div>
    </div>
    


@endforeach





@stop