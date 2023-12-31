<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;
    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
    public function carreras()
    {
        return $this->hasMany(Carrera::class);
    }
}
