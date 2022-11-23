<?php

namespace App\Http\Controllers;

use App\Models\Observaciones;
use App\Models\Evento;
use Illuminate\Http\Request;

class ObservacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $observaciones = Observaciones::all();

        return view('observaciones.list') -> with('observaciones', $observaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('observaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "descripcion" => 'required'
        ]);

        Observaciones::create([
            'evento_id' => $request -> evento,
            'descripcion' => $request -> descripcion
        ]);

        return redirect()->route('observaciones.index') -> with('success','Observación creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Observaciones  $observaciones
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Evento::find($id);
        $observaciones = Observaciones::all();

        return view('observaciones.create') -> with('observaciones', $observaciones)->with('evento', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Observaciones  $observaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Observaciones $observacione)
    {
        return view('observaciones.edit', compact('observacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observaciones  $observaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observaciones $observacione)
    {
        $request->validate([
            "descripcion" => 'required',
        ]);

        $observacione->update($request->all());

        return redirect()->route('observaciones.index') -> with('success','Observción editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Observaciones  $observaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observaciones $observacione)
    {
      $observacione->delete();

      return redirect()->route('observaciones.index') -> with('success', 'Observación eliminada con éxito');
    }
}
