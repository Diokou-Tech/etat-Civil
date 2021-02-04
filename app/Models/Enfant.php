<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'lieuNaiss',
        'dateNaiss',
        'heure',
        'CNIpere',
        'prenomPere',
        'CNImere',
        'nomMere',
        'prenomMere',
        'bulletin',
        'jugement',
        'CNIDeclarant',
        'nomDeclarant',
        'prenomDeclarant',
        'officier',
    ];
    public function jugement(){
        return $this->hasMany(Jugement::class);
    }
}
