<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Recurso;
use App\Models\DetalleRecurso;

class PDFController extends Controller
{
    public function PDF($id){

        $evento = Evento::where('id','=',$id)->get();

        $recursos = Recurso::where('id','=',$id)->get();

        $herramienta = DetalleRecurso::select('detalle_recursos.cantidad','recursos.nomRec','recursos.tipRec','detalle_recursos.id','recursos.usoRec')->join('recursos','detalle_recursos.recurso_id','=','recursos.id')->where('detalle_recursos.evento_id','=',$id)->where('recursos.tipRec','=',0)->get();
        $insumo = DetalleRecurso::select('detalle_recursos.cantidad','recursos.nomRec','recursos.tipRec','detalle_recursos.id','recursos.usoRec')->join('recursos','detalle_recursos.recurso_id','=','recursos.id')->where('detalle_recursos.evento_id','=',$id)->where('recursos.tipRec','=',1)->get();
        $infra = DetalleRecurso::select('detalle_recursos.cantidad','recursos.nomRec','recursos.tipRec','detalle_recursos.id','recursos.usoRec')->join('recursos','detalle_recursos.recurso_id','=','recursos.id')->where('detalle_recursos.evento_id','=',$id)->where('recursos.tipRec','=',2)->get();
        $tec = DetalleRecurso::select('detalle_recursos.cantidad','recursos.nomRec','recursos.tipRec','detalle_recursos.id','recursos.usoRec')->join('recursos','detalle_recursos.recurso_id','=','recursos.id')->where('detalle_recursos.evento_id','=',$id)->where('recursos.tipRec','=',3)->get();
        $otros = DetalleRecurso::select('detalle_recursos.cantidad','recursos.nomRec','recursos.tipRec','detalle_recursos.id','recursos.usoRec')->join('recursos','detalle_recursos.recurso_id','=','recursos.id')->where('detalle_recursos.evento_id','=',$id)->where('recursos.tipRec','=',4)->get();

        $pdf = \PDF::loadView('informe', compact('evento','recursos','herramienta',
    'insumo','infra','tec','otros'));
        return $pdf -> stream('informe.pdf');
    }
}
 