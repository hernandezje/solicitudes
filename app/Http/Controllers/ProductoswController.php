<?php

namespace App\Http\Controllers;

use App\Models\Productosw;
use App\Models\Requerimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProductoswController
 * @package App\Http\Controllers
 */
class ProductoswController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productosws = Productosw::paginate();

        return view('productosw.index', compact('productosws'))
            ->with('i', (request()->input('page', 1) - 1) * $productosws->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $productosws = new Productosw();
        $requerimientos = Requerimiento::find($id);
        return view('productosw.create', compact('productosws','requerimientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Productosw::$rules);

        if($request->file('ps_pdf')!=null){
        //obtenemos el campo file definido en el formulario
        $file = $request->file('ps_pdf');
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('public')->put($nombre,  \File::get($file));
        }else{
          $nombre="";
        }

        $productosws = new Productosw;
        $productosws->titulo = $request->titulo;
        $productosws->observacion = $request->observacion;
        $productosws->requerimientos_id = $request->requerimientos_id;
        $productosws->ps_pdf = $nombre;
        $productosws->save();

        return redirect()->route('requerimiento.index')
            ->with('success', 'Productosw created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productosws = Productosw::find($id);

        return view('productosw.show', compact('productosws'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productosws = Productosw::find($id);

        return view('productosw.edit', compact('productosws'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Productosw $productosw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Productosw::$rules);

        $productosws = Productosw::findOrFail($id);
        $productosws->titulo = $request->titulo;
        $productosws->observacion = $request->observacion;
        $productosws->requerimientos_id = $request->requerimientos_id;
        $productosws->ps_pdf = $nombre;
        $productosws->save();

        return redirect()->route('productosw.index')
            ->with('success', 'Productosw updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productosws = Productosw::find($id)->delete();

        return redirect()->route('requerimiento.index')
            ->with('success', 'Productosw deleted successfully');
    }
}
