@extends("layouts.app")

@section("content")
<h3>Upload photo</h3>
{!! Form::open(['action' => 'PhotosController@store','method' => 'POST','enctype' => 'multipart/form-data']) !!}
        {{Form::text('name','',['placeholder' => 'Photo Name'])}}
        {{Form::file('photo')}}
        {{Form::hidden('album_id', $album_id)}}
        {{Form::submit('submit')}}
{!! Form::close() !!}
@endsection
