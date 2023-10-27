<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
    public function eventoPersonals()
    {
        return $this->hasMany(EventoPersonal::class);
    }
}
