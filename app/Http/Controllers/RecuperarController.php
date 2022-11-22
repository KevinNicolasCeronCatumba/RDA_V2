<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;




class RecuperarController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();

        return view('recuperar');
    }

    public function consultar(Request $request)
    {
        echo ('entra');
        $resp = $request->all();
        $users = DB::select('SELECT * FROM usuarios WHERE correo="' . $resp['email'] . '"');
        // print_r($users);
        session_start();
        session(['rol' => $users[0]->tipo_user]);
        // print_r(session('rol'));
        if (count($users) == 0) {
            echo ('usuario invalido');
        } else {
            echo ('correcto');
        }
        return view('recuperar');
    }
}
