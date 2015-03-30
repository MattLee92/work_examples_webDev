@extends('layouts.master')

@section('content')

    <h3>Posts</h3>
    @foreach ($posts as $ps)
    
               <div class= 'post'>
              <img class= 'photo' src='{{{ $ps['image'] }}}' alt='photo'>
              {{{ $ps['message'] }}} <br> {{{ $ps['date'] }}}
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
              <a href = 'friends'>View Friends</a>
@stop
