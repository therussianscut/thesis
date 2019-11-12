



@extends('layouts.app');


@section('content')
<h1>Twitter Messages</h1>


<form action='/messages' method="post">
  {{ csrf_field() }}


  <input type="text" name="title" placeholder="title"> 
  <input type="text" name="content" placeholder="content"> 

  <button type="submit"> Submit message </button>

</form>


<ul>
    
@foreach($messages as $message)




   <li>  {{$message->title}}
    
         <br>
          {{$message->content}} 
         <br>
         {{Carbon\Carbon::parse($message->created_at)->diffForHumans() }}
         {{ Carbon\Carbon::parse($message->created_at)->format('Y-m-d , G:i:s') }}
        
        
        </li>


@endforeach

</ul>
    



@endsection
