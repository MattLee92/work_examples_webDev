@extends('layouts.master')

@section('title')
Associative array search example
@stop

@section('content')

  <h2>Australian Parlimentary Library</h2>
  <h3>Query</h3>

  <form method="get" action="search">
  <table>
    <tr><td>Enter Search Field: </td><td><input type="text" name="qsearch"></td></tr>
   
    <tr><td colspan=2><input type="submit" value="Search">
                      <input type="reset" value="Reset"></td></tr>
  <table>
  </form>

@stop




