@extends('layout')

@section ('content')

<h1>Products:</h1>

<table class="bordered">
<thead>
<tr><th>Name</th><th>Price</th></tr>
</thead>
<tbody>

@foreach($products as $prod)
  <tr><td>{{{ $prod->name }}}</td><td>{{{ $prod->price }}}</td></tr>
@endforeach



@stop