@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3 my-5">
            <form action='{{ route("film.store")}}' method="POST" enctype="multipart/form-data">
                @csrf
         
                <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name="titre">
                </div>

                <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="description">
                </div>

                <div class="mb-3">
                <label class="form-label">Image</label>
                <input class="form-control" type="file" name="image">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Categorie</label>
                    <select class="form-select" aria-label="Default select example" name="categorie">
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
