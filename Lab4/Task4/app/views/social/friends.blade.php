@extends('layouts.master')

@section('content')

    <h3>List of Friends</h3>
    @foreach ($friends as $fr)
    
               <div class= 'post'>
              <img class= 'photo' src='{{{ $fr['image'] }}}' alt='photo'>
              {{{ $fr['name'] }}} <br> {{{ $fr['dob'] }}}
              </div>
              
    @endforeach


@stop

@section('post')
                <form>
                  Name: <br>
                  <input type = 'text' name = 'name'><br>
                  Message: <br>
                  <textarea name="msgpost" rows='4'cols='16'>Whats on your mind?</textarea><br>
                    <button>Post</button>
              </form>
              <br>
              <a href = 'index.php'>Return Home</a>
@stop