<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'image',
        'description',
        'categorie_id'
    ];

    public function films()
    {
        return $this->hasMany(Film::class);
    }
}
