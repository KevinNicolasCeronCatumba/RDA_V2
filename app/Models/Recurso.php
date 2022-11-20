<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;
    
    protected $fillable = ['nomRec','tipRec','usoRec','cantRec','estRec'];

    public function detallesrecursos(){
        return $this -> hasMany(DetalleRecurso::class);
    }
}
