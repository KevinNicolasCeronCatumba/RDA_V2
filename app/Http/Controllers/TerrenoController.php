<?php

namespace App\Http\Controllers;

use App\Models\Terreno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreTerrenoRequest;

if (isset($_COOKIE['rol'])) {
    session_start();
    session(['rol' => $_COOKIE['rol']]);
}

class TerrenoController extends Controller
{

    public function index()
    {
        $terrenos = Terreno::all();

        return view('terreno.terrenos') -> with('terrenos', $terrenos);
    }

    public function create()
    {
        return view('terreno.add');
    }

    public function store(StoreTerrenoRequest $r)
    {

        Terreno::create($r->all());

        return redirect()->route('terrenos.index')->with('success','Terreno creado correctamente');

    }

    public function show($id)
    {
        //
    }

    public function edit(Terreno $terreno)
    {
        return view('terreno.edit', compact('terreno'));
    }

    public function update(StoreTerrenoRequest $r, Terreno $terreno)
    {

        $terreno->update($r->all());

        return redirect()->route('terrenos.index')->with('success','Terreno actualizado correctamente');
    }

    public function destroy(Terreno $terreno)
    {
        $terreno -> delete();

        return redirect()->route('terrenos.index')->with('success','Terreno eliminado correctamente');
    }
}
