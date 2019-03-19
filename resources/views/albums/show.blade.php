@extends('layouts.app')
@section('content')
<h1>{{$album->name}}</h1>
<a href="/">back</a>
<a href="/photos/create/{{$album->id}}">upload</a>
@foreach($album->photos as $photo)
    <a href="/photos/{{$photo->id}}">
        <img class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}">
    </a>
@endforeach
@endsection
