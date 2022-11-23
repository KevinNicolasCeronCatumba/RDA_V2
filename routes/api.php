<?php

use App\Mail\NewUserNotification;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/', 'WelcomeController@login', function ($e) {
    return 'Creating a note';
});

Route::post('/recuperar', 'WelcomeController@consultar', function ($e) {
    return 'Creating a note';
});

class WelcomeController
{
    function login(Request $request)
    {
        $resp = $request->all();
        $users = DB::select('SELECT * FROM usuarios WHERE correo="' . $resp['email'] . '" and contrasena="' . $resp['password'] . '"');
        
        session_start();
       
        if (count($users) == 0) {
            echo ('usuario invalido');
            return view('welcome');
        } else{
            session(['rol' => $users[0]->tipo_user]);
            return view('content.dashboard.dashboards-analytics');
        } 
    }

    public function consultar(Request $request)
    {
        $resp = $request->all();
        $users = DB::select('SELECT * FROM usuarios WHERE correo="' . $resp['email'] . '"');
        if (count($users) == 0) {
            echo ('usuario invalido');
            return view('recuperar');
        } else {
            echo ('correcto');
            $temple = new NewUserNotification($users[0]->contrasena);
            // $temple = str_replace('{{contrasena}}', $users[0]->contrasena, $temple);
            Mail::to($resp['email'])->send($temple);
            return view('welcome');
        }
    }
}
