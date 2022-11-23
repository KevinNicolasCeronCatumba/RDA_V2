<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Terreno;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


if (isset($_COOKIE['rol'])) {
    session_start();
    session(['rol' => $_COOKIE['rol']]);
}

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::Orderby('fechaEve', 'asc')->get();

        return view('evento.eventos') -> with('eventos', $eventos);
    }


    public function create()
    {
        $terrenos = Terreno::where('estTer','=','1')->Orderby('nomTer','asc')->get();

        $logistico = Usuario::all();

        $fecha = date('Y-m-d');
        $fecha_meses = strtotime('+6 month',strtotime($fecha));
        $fecha_meses = date('Y-m-d', $fecha_meses);

        return view('evento.add')->with('terrenos',$terrenos)->with('logistico', $logistico)->with('now',$fecha)->with('sixmonths',$fecha_meses);
    }

    public function store(Request $r)
    {
        $r -> validate([
            "fechaEve" =>  'required',
            "horaIniEve" => 'required',
            "numArbEve" => 'required|integer',
            "tipEve" => 'required',
            "terreno" => 'required'
        ]);

        Evento::create([
            'fechaEve' => $r -> fechaEve,
            'horaIniEve' => $r -> horaIniEve,
            'numArbEve' => $r -> numArbEve,
            'tipEve' => $r -> tipEve,
            'estEve' => 0,
            'terreno_id' => $r -> terreno,
            'usuario_id' => $r -> usuario
        ]);

        return redirect()->route('eventos.index')->with('success','Evento asignado correctamente');
    }

    public function show($id)
    {
        
    }

    public function edit(Evento $evento)
    {
        $terrenos = Terreno::Orderby('nomTer','asc')->get();

        return view('evento.edit', compact('evento'))->with('terrenos',$terrenos);
    }

    public function update(Request $r, Evento $evento)
    {
        $r -> validate([
            "fechaEve" =>  'required',
            "horaIniEve" => 'required',
            "reporteEve" => 'max:200',
            "numArbEve" => 'required|integer',
            "tipEve" => 'required',
            "terreno" => 'required'
        ]);

        $evento -> update([
            'fechaEve' => $r -> fechaEve,
            'horaIniEve' => $r -> horaIniEve,
            'reporteEve' => $r -> reporteEve,
            'numArbEve' => $r -> numArbEve,
            'tipEve' => $r -> tipEve,
            'estEve' => $r -> estEve,
            'terreno_id' => $r -> terreno 
        ]);

        return redirect()->route('eventos.index')->with('success','Evento actualizado correctamente');
    }

    public function destroy(Evento $evento)
    {
        $evento -> delete();

        return redirect()->route('eventos.index')->with('success','Evento eliminado correctamente');
    }
}
