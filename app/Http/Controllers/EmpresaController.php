<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


if (isset($_COOKIE['rol'])) {
    session_start();
    session(['rol' => $_COOKIE['rol']]);
}

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();

        return view('empresa.empresas') -> with('empresas', $empresas);
    }

    public function create()
    {
        return view('empresa.add');
    }

    public function store(Request $r)
    {

        // MIRAR REGLAS DE VALIDACIÖN CAMPO UNIQUE
        $r -> validate([
            "nomEmp" =>  'required|max:45',
            "nitEmp" => 'required|max:30',
            "telEmp" => 'required|max:20',
            "dirreEmp" => 'required',
        ]);

        Empresa::create($r->all());

        return redirect()->route('empresas.index')->with('success','Empresa creada correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit(Empresa $empresa)
    {
        return view('empresa.edit', compact('empresa'));
    }

    public function update(Request $r, Empresa $empresa)
    {
        // MIRAR REGLAS DE VALIDACIÖN CAMPO UNIQUE
        $r -> validate([
            "nomEmp" =>  'required|max:45',
            "nitEmp" => 'required|max:30',
            "telEmp" => 'required|max:20',
            "dirreEmp" => 'required',
        ]);

        $empresa->update($r->all());

        return redirect()->route('empresas.index')->with('success','Empresa actualizada correctamente');
    }

    public function destroy(Empresa $empresa)
    {
        $empresa -> delete();

        return redirect()->route('empresas.index')->with('success','Empresa eliminada correctamente');
    }
}
