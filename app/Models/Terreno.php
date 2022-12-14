<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terreno extends Model
{
    use HasFactory;

    protected $fillable = ['nomTer','ciudadTer','descTer','extensionTer','terDispTer','tipTer','estTer'];

    public function eventos(){
        return $this -> hasMany(Evento::class);
    }
}
