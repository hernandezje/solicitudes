<?php

namespace App\Http\Controllers;

use App\Models\Requerimiento;
use App\Models\Estado;
use App\Models\Empleado;
use App\Models\Area;
use App\Models\Puesto;
use App\Models\Productosw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class RequerimientoController
 * @package App\Http\Controllers
 */
class RequerimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requerimientos = Requerimiento::orderByDesc('requerimientos.fec_creacion')->paginate();

        $estados = Estado::pluck('descripcion','id');
        $empleados = Empleado::pluck('name','id');

        return view('requerimiento.index', compact('requerimientos','estados','empleados'))
            ->with('i', (request()->input('page', 1) - 1) * $requerimientos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requerimiento = new Requerimiento();
        $estados = Estado::pluck('descripcion','id');
        $empleados = Empleado::pluck('name','id');
        return view('requerimiento.create', compact('requerimiento','estados','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      request()->validate(Requerimiento::$rules);

      if($request->file('rq_pdf')!=null){
        //obtenemos el campo file definido en el formulario
        $file = $request->file('rq_pdf');
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('local')->put($nombre,  \File::get($file));
      }else{
        $nombre="";
      }

      $requerimiento = new Requerimiento;
      $requerimiento->fec_creacion = $request->fec_creacion;
      $requerimiento->fec_entrega = $request->fec_entrega;
      $requerimiento->fec_final = $request->fec_final;
      $requerimiento->titulo = $request->titulo;
      $requerimiento->descripcion = $request->descripcion;
      $requerimiento->observacion = $request->observacion;
      $requerimiento->estado_id = $request->estado_id;
      $requerimiento->empleados_id = $request->empleados_id;
      $requerimiento->rq_pdf = $nombre;
      $requerimiento->save();

      return redirect()->route('requerimiento.index')
            ->with('success', 'Requerimiento created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requerimiento = Requerimiento::find($id);
        $estados = Estado::pluck('descripcion','id');
        $empleados = Empleado::pluck('name','id','puesto_id','area_id');
        $areas = Area::pluck('descripcion','id');
        $puestos = puesto::pluck('descripcion','id');
        $productosw = Productosw::query();
        if(!empty($id)){
        $productosw = $productosw->where('requerimientos_id', $id);
        }
        $productosw = $productosw->get();
        return view('requerimiento.show', compact('requerimiento','productosw'));
    }

    public function show1($id)
    {
        $requerimiento = Requerimiento::find($id);
        $estados = Estado::pluck('descripcion','id');
        $empleados = Empleado::pluck('name','id','puesto_id','area_id');
        $areas = Area::pluck('descripcion','id');
        $puestos = puesto::pluck('descripcion','id');
        $productosw = Productosw::query();
        if(!empty($id)){
        $productosw = $productosw->where('requerimientos_id', $id);
        }
        $productosw = $productosw->get();
        return view('requerimiento.show1', compact('requerimiento','productosw'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requerimiento = Requerimiento::find($id);
        $estados = Estado::pluck('descripcion','id');
        $empleados = Empleado::pluck('name','id');
        return view('requerimiento.edit', compact('requerimiento','estados','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Requerimiento $requerimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        request()->validate(Requerimiento::$rules);

        if($request->file('rq_pdf')!=null){
        //obtenemos el campo file definido en el formulario
        $file = $request->file('rq_pdf');
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));
        //Storage::put('storage/', $file);
        
        }else{
          $nombre="";
        }

        $requerimiento = Requerimiento::findOrFail($id);
        $requerimiento->fec_creacion = $request->fec_creacion;
        $requerimiento->fec_entrega = $request->fec_entrega;
        $requerimiento->fec_final = $request->fec_final;
        $requerimiento->titulo = $request->titulo;
        $requerimiento->descripcion = $request->descripcion;
        $requerimiento->observacion = $request->observacion;
        $requerimiento->estado_id = $request->estado_id;
        $requerimiento->empleados_id = $request->empleados_id;
        $requerimiento->rq_pdf = $nombre;
        $requerimiento->save();

        return redirect()->route('requerimiento.index')
            ->with('success', 'Requerimiento updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $requerimiento = Requerimiento::find($id)->delete();

        return redirect()->route('requerimiento.index')
            ->with('success', 'Requerimiento deleted successfully');
    }
}
