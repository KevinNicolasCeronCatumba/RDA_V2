<?php

namespace App\Http\Controllers;

use App\Models\Voluntario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VoluntarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voluntarios = Voluntario::all();

        return view('voluntario.list') -> with('voluntarios', $voluntarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('voluntario.form');
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
            "nombre" => 'required',
            "apellido" => 'required',
            "tipoDoc" => 'required',
            "numDoc" => 'required|numeric',
            "correo" => 'required|email:rfc,dns',
            "telefono" => 'required|numeric'
        ]);



        Voluntario::create($request->all());


        return url()->full();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voluntario  $voluntario
     * @return \Illuminate\Http\Response
     */
    public function show(Voluntario $voluntario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voluntario  $voluntario
     * @return \Illuminate\Http\Response
     */
    public function edit(Voluntario $voluntario)
    {
        return view('voluntario.edit', compact('voluntario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voluntario  $voluntario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voluntario $voluntario)
    {
        $request->validate([
            "nombre" => 'required',
            "apellido" => 'required',
            "tipoDoc" => 'required',
            "numDoc" => 'required|numeric',
            "correo" => 'required|email:rfc,dns',
            "telefono" => 'required|numeric'
        ]);



        $voluntario->update($request->all());


        return redirect()->route('voluntarios.index') ->  with('success','Voluntario editado con éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voluntario  $voluntario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voluntario $voluntario)
    {
        $voluntario->delete();

        return redirect()->route('voluntarios.index') -> with('success', 'Voluntario eliminado con éxito');
    }
}
