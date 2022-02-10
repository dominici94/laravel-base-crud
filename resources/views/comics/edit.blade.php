@extends('layouts.base')

@section('pageContent')
<h1>Modifica il fumetto: {{$comic->title}}</h1>

<form action="{{route("comics.update", $comic->id)}}" method="POST">
    @csrf
    @method("PUT")

    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="inserisci il titolo del fumetto" value="{{$comic->title}}">
    </div>

    <div class="form-group">
      <label for="description">Descrizione</label>
      <textarea class="form-control" id="description" name="description" placeholder="inserisci la descrizione del fumetto" rows="6">{{$comic->description}}</textarea>
    </div>

    <div class="form-group">
        <label for="image">Immagine</label>
        <input type="text" class="form-control" id="image" name="image" placeholder="inserisci l'URL dell'immagine" value="{{$comic->image}}">
    </div>

    <div class="form-group">
        <label for="price">Prezzo</label>
        <input type="number" class="form-control" step="0.01" name="price" id="price" placeholder="inserisci il prezzo del fumetto" value="{{$comic->price}}">
    </div>

    <div class="form-group">
        <label for="series">Serie</label>
        <input type="text" class="form-control" name="series" id="series" placeholder="inserisci la serie del fumetto" value="{{$comic->series}}">
    </div>

    <div class="form-group">
        <label for="sale">Data di vendita</label>
        <input type="date" class="form-control" name="sale_date" id="sale" placeholder="inserisci la data di vendita" value="{{$comic->sale_date}}">
    </div>

    <div class="form-group">
        <label for="type">Genere</label>
        <select class="form-control" name="type" id="type">
            <option value="">SELEZIONA UN GENERE</option>
            <option value="graphic novel" {{$comic->type == "graphic novel" ? "selected" : ""}}>graphic novel</option>
            <option value="comic book" {{$comic->type == "comic book" ? "selected" : ""}}>comic book</option>
            <option value="other" {{$comic->type == "other" ? "selected" : ""}}>altro</option>
        </select>

    </div>

    <button type="submit" class="btn btn-primary">Modifica Comic</button>
    <a href="{{route("comics.index")}}"><button type="button" class="btn btn-danger">Torna indietro</button></a>
</form>
@endsection