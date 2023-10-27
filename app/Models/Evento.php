<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
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
    public function carreras()
    {
        return $this->belongsTo(Carrera::class);
    }
    public function personals()
    {
        return $this->belongsTo(Personal::class);
    }
    
}
