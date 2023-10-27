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
    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
    public function eventoFacultativos()
    {
        return $this->hasMany(EventoCarreras::class);
    }
}
