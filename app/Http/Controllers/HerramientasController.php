<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Herramienta;

class HerramientasController extends Controller
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
        $herramientas = Herramienta::all();
        return view('herramientas.index', [
            'herramientas' => $herramientas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('herramientas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request,[
            'nombre' => ['required','string', 'max:100'],
            'dimensiones' => ['required','numeric'],
            'dimensiones_medida' => 'string',
            'capacidad' => 'string',
            'capacidad_medida' => 'string'
        ]);

        $nombre = $request->input('nombre');
        $dimensiones = $request->input('dimensiones');
        $dimensiones_medida = $request->input('dimensiones_medida');
        $capacidad = $request->input('capacidad');
        $capacidad_medida = $request->input('capacidad_medida');

        $herramienta = new Herramienta();

        $herramienta->nombre = $nombre;
        $herramienta->dimensiones = $dimensiones;
        $herramienta->dimensiones_medida = $dimensiones_medida;
        $herramienta->capacidad = $capacidad;
        $herramienta->capacidad_medida = $capacidad_medida;

        $herramienta->save();

        return redirect()->route('herramientas.index')->with(['message'=>'<i class="bi bi-check-circle-fill"></i> Herramienta registrada exitosamente']);

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
        $herramienta = Herramienta::find($id);
        
        if ($herramienta) {
            return view('herramientas.edit', [
                'herramienta' => $herramienta
            ]);
        }

        return redirect()->route('herramientas.index')->with(['message' => '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error inesperado']);
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
        $herramienta = Herramienta::find($id);

        if ($herramienta) {
            $validate = $this->validate($request,[
                'nombre' => ['required','string', 'max:100'],
                'dimensiones' => ['required','numeric'],
                'dimensiones_medida' => 'string',
                'capacidad' => 'string',
                'capacidad_medida' => 'string'
            ]);

            $nombre = $request->input('nombre');
            $dimensiones = $request->input('dimensiones');
            $dimensiones_medida = $request->input('dimensiones_medida');
            $capacidad = $request->input('capacidad');
            $capacidad_medida = $request->input('capacidad_medida');

            $herramienta->nombre = $nombre;
            $herramienta->dimensiones = $dimensiones;
            $herramienta->dimensiones_medida = $dimensiones_medida;
            $herramienta->capacidad = $capacidad;
            $herramienta->capacidad_medida = $capacidad_medida;

            $herramienta->update();

            return redirect()->route('herramientas.index')->with(['message'=>'<i class="bi bi-check-circle-fill"></i> Herramienta actualizada exitosamente']);
        }

        return redirect()->route('herramientas.index')->with(['message'=>'<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error inesperado']);
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
        $herramienta = Herramienta::find($id);

        if ($user && $herramienta) {

            $herramienta->delete();
            $message = '<i class="bi bi-check-circle-fill"></i> Registro eliminado satisfactoriamente';

        } else {

            $message = '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error al eliminar';

        }

        return redirect()->route('herramientas.index')->with([
            'message' => $message
        ]);
    }
}
