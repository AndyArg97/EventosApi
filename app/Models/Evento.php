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
    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
    public function facultad()
    {
        return $this->belongsTo(Facultad::class);
    }
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }
    
}
