@extends('layouts.app');



use Carbon\Carbon;



@section('content')
<h1>Twitter Messages</h1>


<form action='/create' method="post">


  <input type="text" name="title" placeholder="title"> 
  <input type="text" name="content" placeholder="content"> 

</form>


<ul>
    
@foreach($messages as $message)




   <li>  {{$message->title}}
    
         <br>
          {{$message->content}} 
         <br>
         {{$message->created_at }}
        
        
        </li>


@endforeach

</ul>
    



@endsection
