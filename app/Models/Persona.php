<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'nombre',
        'apellido',
        'ci',
        'fecha_nacimiento',
        'user_id',
        'personal_id',
        'carrera_id',
    ];
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
    public function puntuacions()
    {
        return $this->hasMany(Puntuacion::class);
    }
    public function facultad()
    {
        return $this->belongsTo(Facultad::class,'facultad_id');
    }
    public function carrera()
    {
        return $this->belongsTo(Carrera::class,'carrera_id');
    }
    public function personal()
    {
        return $this->belongsTo(Personal::class,'personal_id');
    }
    public function users()
    {
        return $this->hasMany(User::class,'user_id');
    }
}
