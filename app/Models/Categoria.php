<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
    public function eventoFacultativos()
    {
        return $this->hasMany(EventoFacultativo::class);
    }
    public function eventoCarreras()
    {
        return $this->hasMany(EventoCarreras::class);
    }
    public function eventoPersonals()
    {
        return $this->hasMany(EventoPersonal::class);
    }
}
