@extends('layouts.app');

@section('content')
    <h1>Edit Post </h1>


    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}



    <div class="form-group">

        {{Form::label('title', 'Title')}}
        {{Form::text('title', $post->title, ['class' =>'form-control', 'placeholder' => 'Title'])}}


    </div>

    <div class="form-group">

        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', $post->body, ['id'=>'content', 'class' =>'form-control', 'placeholder' => 'Main Body'])}}



    </div>

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}



    {{Form::hidden('_method', 'PUT')}}

    {!! Form::close() !!}


@endsection

