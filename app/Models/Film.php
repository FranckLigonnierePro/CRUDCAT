<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'image',
        'description',
        'categorie_id'
    ];

    public function categorie()
    {
        return $this->hasOne(Categorie::class);
    }
}
