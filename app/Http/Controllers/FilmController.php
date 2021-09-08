<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Film;
use FFI;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
        $films = film::join('categories','categories.id','=','films.categorie_id')
        ->get(['films.id','films.titre', 'films.description', 'films.image', 'categories.categorie',]);
        return view('film.index', compact('films'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('film.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $imageName='';

        if($req->image){
            $imageName = time() .'.'. $req->image->extension();
            $req->image->move(public_path('images'), $imageName);
        }

        $newPerso = new Film;
        $newPerso->titre = $req->titre;
        $newPerso->description = $req->description;
        $newPerso->image = "/images/" . $imageName;
        $newPerso->categorie_id = $req->categorie;
        $newPerso->save();

    
        return redirect()->route('film.index')->with('success','film ajouté avec succès');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::findOrFail($id);
        $categories = Categorie::all();
        return view('film.edit', compact('film','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {

        $updateFilm = $req->validate([
            'titre' => 'required',
            
        ]);

        $updateFilm = $req->except(['_token','_method']);

        if($req->image){
            $profileImage = time() .'.'. $req->image->extension();
            $req->image->move(public_path('images'), $profileImage);
            $updateFilm['image'] = "/images/" . $profileImage;
        }


        Film::whereId($id)->update($updateFilm);
        return redirect()->route('film.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perso = Film::findOrFail($id);
        $perso->delete();
        return redirect()->route('film.index');
    }
}
