@extends('layouts.master')

@section('title')
Associative array search results page
@stop

@section('content')

<h2>Australian Parlimentary Library Members</h2>
@if (!empty($query))

<h3>Results for feild '{{{$query}}}' </h3>

@else

<h3>Search returned all results</h3>

@endif


@if (count($lib) == 0)

<p>No results found.</p>

@else 

<table class="bordered">
<thead>
<tr><th>Name</th><th>Address</th><th>Phone Number</th><th>Email</th></tr>
</thead>
<tbody>

@foreach($lib as $lm)
  <tr><td>{{{ $lm['name'] }}}</td><td>{{{ $lm['address'] }}}</td><td>{{{ $lm['phone'] }}}</td><td>{{{ $lm['email'] }}}</td></tr>
@endforeach

</tbody>
</table>
@endif

<p><a href="{{ secure_url('/') }}">New search</a></p>
@stop