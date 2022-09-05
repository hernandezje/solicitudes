<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requerimiento;
use App\Models\Estado;
use App\Models\Empleado;
use App\Models\Area;
use App\Models\puesto;

class ScrumController extends Controller
{
  public function index()
  {

      $empleados = Empleado::pluck('name','id');

      $requerimientos = Requerimiento::first();

      if ($requerimientos==null) {
        return view('scrum.error');
      }else{

        $pendiente = $requerimientos->where('estado_id','1')->get();
        $encurso = $requerimientos->where('estado_id','2')->get();
        $finalizado = $requerimientos->where('estado_id','3')->get();

        return view('scrum.index', compact('encurso','finalizado','pendiente'));
      }

  }
}
