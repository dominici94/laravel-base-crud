@extends('layouts.base')

@section('pageContent')
<h1>Crea un nuovo fumetto</h1>

<form action="{{route("comics.store")}}" method="POST">
    {{-- token da inserire in ogni form --}}
    @csrf

    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="inserisci il titolo del fumetto" value="{{old("title")}}">
      @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="description">Descrizione</label>
      <textarea rows="6" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="inserisci la descrizione del fumetto" value="{{old("description")}}"></textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">Immagine</label>
        <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="inserisci l'URL dell'immagine" value="{{old("image")}}">
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">Prezzo</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" step="0.01" name="price" id="price" placeholder="inserisci il prezzo del fumetto" value="{{old("price")}}">
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="series">Serie</label>
        <input type="text" class="form-control @error('series') is-invalid @enderror" name="series" id="series" placeholder="inserisci la serie del fumetto" value="{{old("series")}}">
        @error('series')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="sale">Data di vendita</label>
        <input type="date" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" id="sale" placeholder="inserisci la data di vendita" value="{{"old(sale_date"}}">
        @error('sale_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="type">Genere</label>
        <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
            <option value="">SELEZIONA UN GENERE</option>
            <option value="graphic novel" {{old("type") == "graphic novel" ? "selected" : ""}}>graphic novel</option>
            <option value="comic book" {{old("type") == "comic book" ? "selected" : ""}}>comic book</option>
            <option value="other" {{old("type") == "other" ? "selected" : ""}}>altro</option>
        </select>
        @error('type')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Crea Comic</button>
    <a href="{{route("comics.index")}}"><button type="button" class="btn btn-danger">Torna indietro</button></a>
</form>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
@endsection