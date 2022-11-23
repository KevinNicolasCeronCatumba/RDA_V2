<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observaciones extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion','evento_id'];

    public function evento(){
        return $this -> belongsTo(Evento::class, 'evento_id');
    }
}
