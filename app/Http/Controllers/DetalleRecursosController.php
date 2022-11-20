<?php

namespace App\Http\Controllers;

use App\Models\DetalleRecurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreDetalleRecursoRequest;
use App\Models\Evento;
use App\Models\Recurso;

class DetalleRecursosController extends Controller
{
    public function index()
    {
    
    }

    public function create()
    {
        return view('detallerecurso.form');
    }

    public function store(StoreDetalleRecursoRequest $request)
    {
        DetalleRecurso::create([ 
            'evento_id' => $request -> evento,
            'recurso_id' => $request -> recurso,
            'cantidad' => $request -> cantidad
        ]);

        return redirect()->route('detallerecursos.show',$request -> evento) ->  with('success','Detalle Recurso creado con éxito');
    }

    public function show($id)
    {
        $detallerecursos = DetalleRecurso::where('evento_id','=',$id)->get();

        // Consultas por tipo
        $herramienta = DetalleRecurso::select('detalle_recursos.cantidad','recursos.nomRec','recursos.tipRec','detalle_recursos.id')->join('recursos','detalle_recursos.recurso_id','=','recursos.id')->where('detalle_recursos.evento_id','=',$id)->where('recursos.tipRec','=',0)->get();
        $insumo = DetalleRecurso::select('detalle_recursos.cantidad','recursos.nomRec','recursos.tipRec','detalle_recursos.id')->join('recursos','detalle_recursos.recurso_id','=','recursos.id')->where('detalle_recursos.evento_id','=',$id)->where('recursos.tipRec','=',1)->get();
        $infra = DetalleRecurso::select('detalle_recursos.cantidad','recursos.nomRec','recursos.tipRec','detalle_recursos.id')->join('recursos','detalle_recursos.recurso_id','=','recursos.id')->where('detalle_recursos.evento_id','=',$id)->where('recursos.tipRec','=',2)->get();
        $tecnologia = DetalleRecurso::select('detalle_recursos.cantidad','recursos.nomRec','recursos.tipRec','detalle_recursos.id')->join('recursos','detalle_recursos.recurso_id','=','recursos.id')->where('detalle_recursos.evento_id','=',$id)->where('recursos.tipRec','=',3)->get();

        $id = Evento::find($id);
        $recursos = Recurso::all();

        

        return view('detallerecurso.list')->with('evento', $id)-> with('detallerecursos', $detallerecursos)->
                with('recursos',$recursos)->with('herramienta',$herramienta)->with('insumo',$insumo)->with('infra', $infra)->with('tec',$tecnologia);
    }

    public function edit(DetalleRecurso $detallerecurso)
    {
        return view('detallerecurso.edit', compact('detallerecurso'));
    }

    public function update(StoreDetalleRecursoRequest $request, DetalleRecurso $detallerecurso)
    {
        $request->validate([
            "cantidad" => 'required',
            "tipo_recurso" => 'required',
            "recurso_id" => 'required'
        ]);

        $detallerecurso->update($request->all());

        return redirect()->route('detallerecursos.index') ->  with('success','Detalle Recurso editado con éxito');

    }

    public function destroy(DetalleRecurso $detallerecurso)
    {
        $detallerecurso->delete();

        return redirect()->route('eventos.index') -> with('success', 'Recurso eliminado del evento con éxito');
    }
}
