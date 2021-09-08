@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-8 offset-1 d-flex justify-content-between align-items-center">
          <h1>Liste des films</h1>
          <a href="{{route('film.create')}}" class="btn btn-primary">Ajouter un nouveau film</a>
      </div>
</div>
</div>

@if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                      @endif

<div class="container">
    <div class="row">
        <div class="col my-5  d-flex">
            @foreach($films as $film)
            <div class="card mx-2" style="width: 18rem;">
                <img src="{{$film->image}}" class="card-img-top" alt="{{$film->titre}}">
                <div class="card-body">
                <h5 class="card-title">Titre: {{$film->titre}}</h5>
                <h5 class="card-title">Categorie: {{$film->categorie}}</h5>       
                <p class="card-text">Description: {{$film->description}}</p>
                <a href="{{ route('film.edit', $film->id)}}" class="btn btn-primary">Modifier</a>
                <form action='{{ route("film.destroy", $film->id) }}' method="POST" >
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection