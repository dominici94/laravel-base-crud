@extends('layouts.base')

@section('pageContent')

    <h1>Comics</h1>

    <a href="{{route("comics.create")}}"><button type="button" class="btn btn-primary">Aggiungi Comic</button></a>
    
    <table class="table mt-3">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Serie</th>
                <th scope="col">Data di vendita</th>
                <th scope="col">Genere</th>
                <th scope="col" >Azioni</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($comics as $comic)

            <tr>
                <td>{{$comic['id']}}</td>
                <td>{{$comic['title']}}</td>
                <td>{{$comic['description']}}</td>
                <td>{{$comic['price']}}</td>
                <td>{{$comic['series']}}</td>
                <td>{{$comic['sale_date']}}</td>
                <td>{{$comic['type']}}</td>
                <td>
                    <a href="{{route("comics.show", $comic->id)}}"><button type="button" class="btn btn-info">Visualizza</button></a>
                    <a href="{{route("comics.edit", $comic->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                    <form action="{{route("comics.destroy", $comic->id)}}" onsubmit=" return myFunction()" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </td>
                
            </tr>

        @endforeach
        </tbody>

    </table>
@endsection