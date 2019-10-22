@extends('layouts.app');

@section('content')


    <a href="/posts" class="btn btn-primary">Go Back</a>
    <h1> {{$post->title}}</h1>
    <small> written on {{$post->created_at}}</small>

    <div>

        {!!$post->body!!}

    </div>

    <div>


            <div class="row">
                <div class="col-12">
                    <h3> Image Here!!</h3>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-thumbnail">
                </div>
            </div>



    </div>



    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'pull-right'])!!}

    {{Form::hidden('_method', 'DELETE')}}

    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}


    {!! Form::close() !!}

    @endsection
