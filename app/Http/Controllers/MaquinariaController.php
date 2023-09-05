<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maquinaria;
use App\Plan_Mantenimiento;
use App\Taller;

class MaquinariaController extends Controller
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
        $maquinas = Maquinaria::all();
        return view('maquinaria.index', [
            'maquinas' => $maquinas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $talleres = Taller::all();

        return view('maquinaria.create', [
            'talleres' => $talleres
        ]);
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
            'id_taller' => ['required', 'regex:/[0-9]+/'],
            'serial_institucion' => ['required', 'unique:maquinaria'],
            'serial_maquina' => ['required', 'unique:maquinaria'],
            'nombre' => ['required', 'string'],
            'marca' => 'string',
            'modelo' => 'string',
            'capacidad' => 'numeric',
            'capacidad_medida' => ['string', 'max:10'],
            'condicion' => ['required', 'string', 'max:50'],
            'observacion' => ['string', 'max:255']
        ]);

        

        $id_taller = $request->input('id_taller');
        $serial_institucion = $request->input('serial_institucion');
        $serial_maquina = $request->input('serial_maquina');
        $nombre = $request->input('nombre');
        $marca = $request->input('marca');
        $modelo = $request->input('modelo');
        $capacidad = $request->input('capacidad');
        $capacidad_medida = $request->input('capacidad_medida');
        $condicion = $request->input('condicion');
        $observacion = $request->input('observacion');

        $maquina = new Maquinaria();

        $maquina->id_taller = $id_taller;
        $maquina->serial_institucion = $serial_institucion;
        $maquina->serial_maquina = $serial_maquina;
        $maquina->nombre = $nombre;
        $maquina->marca = $marca;
        $maquina->modelo = $modelo;
        $maquina->capacidad = $capacidad;
        $maquina->capacidad_medida = $capacidad_medida;
        $maquina->condicion = $condicion;
        $maquina->observacion = $observacion;

        $maquina->save();

        return redirect()->route('maquinaria.index')->with(['message' => '<i class="bi bi-check-circle-fill"></i> Maquina registrada exitosamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maquina = Maquinaria::find($id);
        
        if ($maquina) {
            $planes = Plan_Mantenimiento::where('id_maquina', $id)->orderBy('fecha', 'desc')->get();

            return view('maquinaria.show', [
                'maquina' => $maquina,
                'planes' => $planes
            ]);
        }

        return redirect()->route('maquinaria.index')->with(['message' => '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error inesperado']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $talleres = Taller::all();
        $maquina = Maquinaria::find($id);
        return view('maquinaria.edit', [
            'maquina' => $maquina,
            'talleres' => $talleres
        ]);
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
        $maquina = Maquinaria::find($id);
        
        if ($maquina) {
            $validate = $this->validate($request, [
                'id_taller' => ['required', 'regex:/[0-9]+/'],
                'serial_institucion' => ['required', 'unique:maquinaria,serial_institucion,'.$id],
                'serial_maquina' => ['required', 'unique:maquinaria,serial_maquina,'.$id],
                'nombre' => ['required', 'string'],
                'marca' => 'string',
                'modelo' => 'string',
                'capacidad' => 'numeric',
                'capacidad_medida' => ['string', 'max:10'],
                'condicion' => ['required', 'string', 'max:50'],
                'observacion' => ['string', 'max:255']
            ]);

            $id_taller = $request->input('id_taller');
            $serial_institucion = $request->input('serial_institucion');
            $serial_maquina = $request->input('serial_maquina');
            $nombre = $request->input('nombre');
            $marca = $request->input('marca');
            $modelo = $request->input('modelo');
            $capacidad = $request->input('capacidad');
            $capacidad_medida = $request->input('capacidad_medida');
            $condicion = $request->input('condicion');
            $observacion = $request->input('observacion');

            $maquina->id_taller = $id_taller;
            $maquina->serial_institucion = $serial_institucion;
            $maquina->serial_maquina = $serial_maquina;
            $maquina->nombre = $nombre;
            $maquina->marca = $marca;
            $maquina->modelo = $modelo;
            $maquina->capacidad = $capacidad;
            $maquina->capacidad_medida = $capacidad_medida;
            $maquina->condicion = $condicion;
            $maquina->observacion = $observacion;

            $maquina->update();

            return redirect()->route('maquinaria.index')->with(['message' => '<i class="bi bi-check-circle-fill"></i> Maquina actualizada exitosamente']);

        }

        return redirect()->route('maquinaria.index')->with(['message' => '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error inesperado']);

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
        $maquina = Maquinaria::find($id);

        if ($user && $maquina) {

            $maquina->delete();
            $message = '<i class="bi bi-check-circle-fill"></i> Registro eliminado satisfactoriamente';

        } else {

            $message = '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error al eliminar';

        }

        return redirect()->route('maquinaria.index')->with([
            'message' => $message
        ]);
    }
}
