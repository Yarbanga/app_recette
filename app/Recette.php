<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    protected $fillable = [
        'libelle', 'quantite', 'prix', 'recette',
    ];
}
