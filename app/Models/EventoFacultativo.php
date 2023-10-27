<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoFacultativo extends Model
{
    use HasFactory;
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
    public function puntuacions()
    {
        return $this->hasMany(Puntuacion::class);
    }
    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function facultads()
    {
        return $this->belongsTo(Facultad::class);
    }
}
