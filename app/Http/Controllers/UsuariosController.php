<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

if (isset($_COOKIE['rol'])) {
    session_start();
    session(['rol' => $_COOKIE['rol']]);
}

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();

        return view('usuario.list') -> with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.form');
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
            "tipo_doc" => 'required',
            "tipo_user"=>'required',
            "num_doc" => 'required|numeric',
            "correo" => 'required|email:rfc,dns',
            "contrasena" => 'required'
        ]);

        Usuario::create($request->all());

        return redirect()->route('usuarios.index') ->  with('success','Usuario creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            "nombre" => 'required',
            "apellido" => 'required',
            "tipo_doc" => 'required',
            "tipo_user"=>'required',
            "num_doc" => 'required|numeric',
            "correo" => 'required|email:rfc,dns',
            "contrasena" => 'required'
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index') ->  with('success','Usuario editado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index') -> with('success', 'Usuario eliminado con éxito');
    }
}
