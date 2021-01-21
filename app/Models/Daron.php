<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daron extends Model
{
    use HasFactory;

    public function enfant(){
        return $this->belongsTo(Enfant::class);
    }
}
