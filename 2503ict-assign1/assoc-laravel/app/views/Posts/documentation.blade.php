@extends('layouts.master')

{{ HTML::style('css/wp.css') }}

@section('header')
<div>
<div class ="post">
<h1>Entity Relationship diagram</h1>
<img class="photo_doc" src="../images/er_diagram.png">
</div>
<div class="post">
    
<h1>Site diagram</h1>
<img class="photo_doc" src="../images/site_diagram.png">
</div>

<div class="post">
    
<h1>Report</h1>
<p>I was able to complete the vast majority of this assignment. While one or two points I could not implement. I was able to implement the creating, editing and deleting of posts as well as the creation and deletion of comments and showing a comment count for each post.</p>
<p>However I ran into issues with redirecting to the correct pages e.g. Deleting a comment should redirect to the comments page, however I encountered errors while trying this and was only able to redirect to the home page. Routing is still something I am yet to fully master.</p>
<p>In order to complete this assignment I started with the bootstrap core code for the master.layouts giving me a foundation to build from. I made use of the bootstrap columns in order to create an easier user experience e.g. Having the ability to create a post while being able to see all posts (this was also implemented for comments). I found the easiest approach for this assignment was to use the requirements from the assignment sheet as a checklist to breakdown the workload, the too cross reference that to the rubric so see if what I had done was sufficient.</p>
</div>



</div>
@stop