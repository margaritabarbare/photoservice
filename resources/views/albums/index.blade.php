@extends("layouts.app")

@section("content")

@foreach($albums as $album)
    <a href="/albums/{{$album->id}}">
        <img class="thumbnail" src="storage/album_covers/{{$album->cover_image}}">
    <br>
    <h4>{{$album->name}}</h4></a>
@endforeach
@endsection

