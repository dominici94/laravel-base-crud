@extends('layouts.base')

@section('pageContent')
    <ul>
        @foreach ($comics as $comic)
            <li>{{$comic['title']}}</li>
        
        @endforeach
    </ul>
@endsection