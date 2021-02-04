<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugement extends Model
{
    use HasFactory;

    protected $fillable = [
        'idJugement',
        'tribunal',
        'motif',
        'dateJugement',
    ];

    public function enfant(){
        return $this->belongsTo(Enfant::class);
    }
}
