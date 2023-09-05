<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repuesto;

class RepuestosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repuestos = Repuesto::all();
        return view('repuestos.stock.index', [
            'repuestos' => $repuestos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repuestos.stock.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'nombre' => ['required', 'string'],
            'dimensiones' => ['nullable', 'numeric', 'regex:/[0-9.,]+/'],
            'dimensiones_medida' => ['nullable', 'string'],
            'capacidad' => ['nullable', 'numeric', 'regex:/[0-9.,]+/'],
            'capacidad_medida' => ['nullable', 'string'],
            'costo_estimado' => ['required', 'numeric']
        ]);

        $nombre = $request->input('nombre');
        $dimensiones = $request->input('dimensiones');
        $dimensiones_medida = $request->input('dimensiones_medida');
        $capacidad = $request->input('capacidad');
        $capacidad_medida = $request->input('capacidad_medida');
        $costo_estimado = $request->input('costo_estimado');

        $repuesto = new Repuesto();

        $repuesto->nombre = $nombre;
        $repuesto->dimensiones = $dimensiones;
        $repuesto->dimensiones_medida = $dimensiones_medida;
        $repuesto->capacidad = $capacidad;
        $repuesto->capacidad_medida = $capacidad_medida;
        $repuesto->costo_estimado = $costo_estimado;

        $repuesto->save();

        return redirect()->route('repuestos.index')->with(['message' => '<i class="bi bi-check-circle-fill"></i> Repuesto registrado exitosamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repuesto = Repuesto::find($id);
        
        if ($repuesto) {
            return view('repuestos.stock.edit', [
                'repuesto' => $repuesto
            ]);
        }

        return redirect()->route('repuestos.index')->with(['message' => '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error inesperado']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'nombre' => ['required', 'string'],
            'dimensiones' => ['nullable', 'numeric', 'regex:/[0-9.,]+/'],
            'dimensiones_medida' => ['nullable', 'string'],
            'capacidad' => ['nullable', 'numeric', 'regex:/[0-9.,]+/'],
            'capacidad_medida' => ['nullable', 'string'],
            'costo_estimado' => ['required', 'numeric']
        ]);

        $nombre = $request->input('nombre');
        $dimensiones = $request->input('dimensiones');
        $dimensiones_medida = $request->input('dimensiones_medida');
        $capacidad = $request->input('capacidad');
        $capacidad_medida = $request->input('capacidad_medida');
        $costo_estimado = $request->input('costo_estimado');

        $repuesto = Repuesto::find($id);

        $repuesto->nombre = $nombre;
        $repuesto->dimensiones = $dimensiones;
        $repuesto->dimensiones_medida = $dimensiones_medida;
        $repuesto->capacidad = $capacidad;
        $repuesto->capacidad_medida = $capacidad_medida;
        $repuesto->costo_estimado = $costo_estimado;

        $repuesto->update();

        return redirect()->route('repuestos.index')->with(['message' => '<i class="bi bi-check-circle-fill"></i> Repuesto actualizado exitosamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \Auth::user();
        $repuesto = Repuesto::find($id);

        if ($user && $repuesto) {

            $repuesto->delete();
            $message = '<i class="bi bi-check-circle-fill"></i> Registro eliminado satisfactoriamente';

        } else {

            $message = '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error al eliminar';

        }

        return redirect()->route('repuestos.index')->with([
            'message' => $message
        ]);
    }
}
