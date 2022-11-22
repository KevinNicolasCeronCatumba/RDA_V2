<?php

namespace App\Http\Controllers;

use App\Models\Evento_voluntario;
use App\Models\Evento;
use App\Models\Voluntario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class Evento_voluntarioController extends Controller
{

    public function organize($id)
    {
      $id =  Crypt::decrypt($id);
      $evento = Evento::findOrFail($id);

      $voluntarios = Voluntario::whereDoesntHave('eventos', function (Builder $query) use($evento) {
        $query->where('evento_id', 'like', [$evento->id]);})->Orderby('nombre','asc')->get();

      $grupo = Evento::find($id)->voluntarios()->get();

      return view('grupo.add', compact('evento', 'voluntarios', 'grupo'));

    }



    public function store(Request $r, $id)
    {
      $evento = Evento::findOrFail($id);

      $voluntario = $r -> voluntario;

      $evento->voluntarios()->attach($voluntario);

      $idevento = Crypt::encrypt($evento->id);

      return redirect()->route('grupos.organize', $idevento);
    }




    public function eliminar(Request $r, $id)
    {
      $evento = Evento::findOrFail($id);

      $voluntario = $r -> voluntario;

      $evento->voluntarios()->detach($voluntario);

      $idevento = Crypt::encrypt($evento->id);

      return redirect()->route('grupos.organize', $idevento);
    }



}
