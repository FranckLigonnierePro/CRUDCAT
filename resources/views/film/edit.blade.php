@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
              @endif
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3 my-5">
            <form action='{{ route("film.update", $film->id)}}' method="POST" enctype="multipart/form-data">
                @csrf
          
                @method('PATCH')
                <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name="titre" value="{{$film->titre}}">
                </div>

                <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="description" value="{{$film->description}}">
                </div>

                <div class="mb-3">
                <label class="form-label">Image</label>
                <input class="form-control" type="file" name="image" value="{{$film->image}}">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Categorie</label>
                    <select class="form-select" aria-label="Default select example" name="categorie_id" value="{{$film->categorie_id}}">
                        <option  selected disabled="disabled">Choisir une categorie</option>
                        @foreach($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                        @endforeach                       
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>

@endsection
