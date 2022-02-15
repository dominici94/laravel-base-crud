@extends('layouts.base')

@section('pageContent')
<h1>Modifica il fumetto: {{$comic->title}}</h1>

<form action="{{route("comics.update", $comic->id)}}" method="POST">
    @csrf
    @method("PUT")

    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="inserisci il titolo del fumetto" value="{{old("title") ? old("title") : $comic->title}}">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
      <label for="description">Descrizione</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="inserisci la descrizione del fumetto" rows="6">{{old("description") ? old("description") : $comic->description}}</textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">Immagine</label>
        <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="inserisci l'URL dell'immagine" value="{{old("image") ? old("image") : $comic->image}}">
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">Prezzo</label>
        <input type="number" class="form-control  @error('price') is-invalid @enderror" step="0.01" name="price" id="price" placeholder="inserisci il prezzo del fumetto" value="{{old("price") ? old("price") : $comic->price}}">
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="series">Serie</label>
        <input type="text" class="form-control @error('series') is-invalid @enderror" name="series" id="series" placeholder="inserisci la serie del fumetto" value="{{old("series") ? old("series") : $comic->series}}">
        @error('series')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="sale">Data di vendita</label>
        <input type="date" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" id="sale" placeholder="inserisci la data di vendita" value="{{old("sale_date") ? old("sale_date") : $comic->sale_date}}">
        @error('sale_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="type">Genere</label>
        <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
            @if (old("type"))
                <option value="">SELEZIONA UN GENERE</option>
                <option value="graphic novel" {{old("type") == "graphic novel" ? "selected" : ""}}>graphic novel</option>
                <option value="comic book" {{old("type") == "comic book" ? "selected" : ""}}>comic book</option>
                <option value="other" {{old("type") == "other" ? "selected" : ""}}>altro</option>  
            @else
                <option value="">SELEZIONA UN GENERE</option>
                <option value="graphic novel" {{$comic->type == "graphic novel" ? "selected" : ""}}>graphic novel</option>
                <option value="comic book" {{$comic->type == "comic book" ? "selected" : ""}}>comic book</option>
                <option value="other" {{$comic->type == "other" ? "selected" : ""}}>altro</option>
            @endif
        </select>

    </div>

    <button type="submit" class="btn btn-primary">Modifica Comic</button>
    <a href="{{route("comics.index")}}"><button type="button" class="btn btn-danger">Torna indietro</button></a>
</form>
@endsection