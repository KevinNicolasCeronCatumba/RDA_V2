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


    public function asistencia($id)
    {
      $id =  Crypt::decrypt($id);
      $evento = Evento::findOrFail($id);

      $grupo = Evento::find($evento->id)->voluntarios()->Orderby('nombre','asc')->get();

      return view('grupo.asistencia', compact('evento', 'grupo'));

    }


    public function guardarA(Request $request, $id)
    {
      $asisten = $request->checkbox;

      foreach ($asisten as $a){
        $sql = 'UPDATE evento_voluntario SET asistencia = true WHERE evento_id='.$id.' AND voluntario_id='.$a.';';

        $asisV=DB::update('UPDATE evento_voluntario SET asistencia = true WHERE evento_id='.$id.' AND voluntario_id='.$a.';');
      }

      return redirect()->route('eventos.index')->with('success','Asistencia guardada correctamente');

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
