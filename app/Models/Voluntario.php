<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'tipoDoc', 'numDoc', 'correo', 'telefono'];

    //método que traé el modelo de la relación evento
    public function eventos(){
      return $this->belongsToMany(Evento::class)->withTimestamps()->withPivot('asistencia');
  }
}
