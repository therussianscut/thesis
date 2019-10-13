@extends('layouts.app');

@section('content')


    <a href="/posts" class="btn btn-primary">Go Back</a>
    <h1> {{$post->title}}</h1>
    <small> written on {{$post->created_at}}</small>

    <div>

        {{$post->body}}

    </div>

    @endsection
