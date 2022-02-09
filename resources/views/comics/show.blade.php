@extends('layouts.base')

@section('pageContent')
    <h1>{{$comic["id"]}} {{$comic->title}}</h1>
    <img src="{{$comic->image}}" alt="{{$comic->title}}">
    <p>
        {{-- i due !! per tradurre il codice HTML inserito nell'elemento --}}
        {{!!$comic->description!!}}
    </p>
    <div>
        <a href="{{route("comics.index")}}"><button type="button" class="btn btn-primary">Torna ai comics</button></a>
    </div>
@endsection
