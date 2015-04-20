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
<tr><th>No.</th><th>Name</th><th>Party</th><th>Duration</th><th>State</th><th>Start</th><th>Finish</th></tr>
</thead>
<tbody>

@foreach($lib as $lm)
  <tr><td>{{{ $lm->number }}}</td><td>{{{ $lm->name }}}</td><td>{{{ $lm->party }}}</td><td>{{{ $lm->duration }}}</td><td>{{{ $lm->state }}}</td><td>{{{ $lm->start }}}</td><td>{{{ $lm->finish }}}</td></tr>
@endforeach

</tbody>
</table>
@endif

<p><a href="{{ secure_url('/') }}">New search</a></p>
@stop