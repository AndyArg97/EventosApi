<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    public function personas()
    {
        return $this->belongsTo(Persona::class);
    }
    public function eventos()
    {
        return $this->belongsTo(Evento::class);
    }
    public function eventoFacultativos()
    {
        return $this->belongsTo(EventoFacultativo::class);
    }
    public function eventoCarreras()
    {
        return $this->belongsTo(EventoCarreras::class);
    }
    public function eventoPersonals()
    {
        return $this->belongsTo(EventoPersonal::class);
    }
}
