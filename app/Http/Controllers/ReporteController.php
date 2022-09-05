<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requerimiento;

class ReporteController extends Controller
{
    //
    public function index()
    {
      $requerimientos = Requerimiento::first();

      if ($requerimientos==null) {
      }else{

        $pendiente = count($requerimientos->where('estado_id','1')->get());
        $encurso =  count($requerimientos->where('estado_id','2')->get());
        $finalizado =  count($requerimientos->where('estado_id','3')->get());
        $anio_actual = date('Y');
        $hoy = date("Y-m-d");

        $finales =  $requerimientos->whereYear('fec_final','=',$anio_actual)->get();
        $nofinal =  $requerimientos->whereNull('fec_final')->get();

        $sinretrasos = count($requerimientos->whereYear('fec_final','=',$anio_actual)->where('fec_entrega','>=','fec_final')->get());
        $rantiguos = count($requerimientos->whereYear('fec_final','=',$anio_actual)->whereColumn('fec_entrega','<','fec_final')->get());

        $rpendientes = count($requerimientos->whereNull('fec_final')->where('fec_entrega','<=',$hoy)->get());

        return view('reporte.index',compact('pendiente','encurso','finalizado','anio_actual','hoy','rantiguos','sinretrasos','rpendientes'));

      }
    }

    public function imprimir(){
      $requerimientos = Requerimiento::first();
      if ($requerimientos==null) {
      }else{

        $anio_actual = date("y");
        $pendiente = $requerimientos->where('estado_id','1')->get();
        $encurso =  $requerimientos->where('estado_id','2')->get();
        $finalizado =  $requerimientos->where('estado_id','3')->get();
        $cpendiente = count($requerimientos->where('estado_id','1')->get());
        $cencurso =  count($requerimientos->where('estado_id','2')->get());
        $cfinalizado =  count($requerimientos->where('estado_id','3')->get());
        $hoy = date("d-m-y");
      }

     $pdf = \PDF::loadView('reporte.documento',compact('hoy','pendiente','encurso','finalizado','anio_actual','cpendiente','cencurso','cfinalizado'));
     return $pdf->stream('listados.pdf');
   }

   public function imprimir2(){
     $requerimientos = Requerimiento::first();

     if ($requerimientos==null) {
     }else{

       $pendiente = count($requerimientos->where('estado_id','1')->get());
       $encurso =  count($requerimientos->where('estado_id','2')->get());
       $finalizado =  count($requerimientos->where('estado_id','3')->get());
       $anio_actual = date('Y');
       $hoy = date("Y-m-d");

       $finales =  $requerimientos->whereYear('fec_final','=',$anio_actual)->get();
       $nofinal =  $requerimientos->whereNull('fec_final')->get();

       $sinretrasos = count($requerimientos->whereYear('fec_final','=',$anio_actual)->where('fec_entrega','>=','fec_final')->get());
       $rantiguos = count($requerimientos->whereYear('fec_final','=',$anio_actual)->whereColumn('fec_entrega','<','fec_final')->get());

       $rpendientes = count($requerimientos->whereNull('fec_final')->where('fec_entrega','<=',$hoy)->get());

       $lsinretrasos = $requerimientos->whereYear('fec_final','=',$anio_actual)->where('fec_entrega','>=','fec_final')->get();
       $lrantiguos = $requerimientos->whereYear('fec_final','=',$anio_actual)->whereColumn('fec_entrega','<','fec_final')->get();

       $lrpendientes = $requerimientos->whereNull('fec_final')->where('fec_entrega','<=',$hoy)->get();

      }
       $pdf = \PDF::loadView('reporte.documento1',compact('pendiente','encurso','finalizado','anio_actual','hoy','rantiguos','sinretrasos','rpendientes','lrantiguos','lsinretrasos','lrpendientes'));
       return $pdf->stream('retrasos.pdf');
     }
}
