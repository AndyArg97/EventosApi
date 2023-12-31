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
    public function carreras()
    {
        return $this->belongsTo(Facultad::class,'carrera_id');
    }
    public function personals()
    {
        return $this->belongsTo(Personal::class,'personal_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
