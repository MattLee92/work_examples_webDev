@extends('layouts.master')

{{ HTML::style('css/wp.css') }}

@section('header')
<div>
<div class ="post">
<h1>Entity Relationship diagram</h1>
<img class="photo_doc" src="../images/er_diagram2.png">
</div>
<div class="post">
    
<h1>Site diagram</h1>
<img class="photo_doc" src="../images/site_diagram2.png">
</div>

<div class="post">
    
<h1>Report</h1>
<p>I was able to complete the vast majority of this assignment. While one or two points I could not implement. I was able to convert Assignment 1 to use migrations etc and was able to implement most of the new functionality.</p>
<p>However I ran into issues with accessing dynamic properties. Therefore I could not always display user information related to a post (i.e. Profile picture - even though they can be uploaded and stored correctly)</p>
<p>In order to complete this assignment I created a new project and copied in the views etc from the last assignment, updated the code to support migrations, eloquent etc. I then read through the spec sheet implementing the new functionality and marking off as it was completed..</p>
</div>



</div>
@stop