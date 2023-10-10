<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    public function facultads()
    {
        return $this->belongsTo(Facultad::class);
    }
    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
}
