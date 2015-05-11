@extends('layout')

@section ('content')

<h1>Products:</h1>

<ul>
@foreach($products as $prod)

 <li> {{ link_to_route('product.show', $prod->name , array($prod->id)) }} </li>
 
@endforeach
</ul>


@stop