<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreRecursoRequest;

if (isset($_COOKIE['rol'])) {
    session_start();
    session(['rol' => $_COOKIE['rol']]);
}

class RecursosController extends Controller
{
    public function index()
    {
        $recursos = Recurso::orderby("nomRec","asc")->get();

        return view('recurso.list') -> with('recursos', $recursos);
    }

    public function create()
    {
        return view('recurso.form');
    }

    public function store(StoreRecursoRequest $request)
    {

        Recurso::create($request->all());

        return redirect()->route('recursos.index') ->  with('success','Recurso creado con éxito');
    }

    public function show(Recurso $recurso)
    {
        //
    }

    public function edit(Recurso $recurso)
    {
        return view('recurso.edit', compact('recurso'));
    }

    public function update(StoreRecursoRequest $request, Recurso $recurso)
    {

        $recurso->update($request->all());

        return redirect()->route('recursos.index') ->  with('success','Recurso editado con éxito');
    }

    public function destroy(Recurso $recurso)
    {
        $recurso->delete();

        return redirect()->route('recursos.index') -> with('success', 'Recurso eliminado con éxito');
    }
}
