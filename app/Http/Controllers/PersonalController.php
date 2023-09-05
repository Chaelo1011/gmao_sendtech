<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;

class PersonalController extends Controller
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
        $personal = Personal::all();
        return view('personal.index', [
            'personal' => $personal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personal.create');
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
            'ci' => ['required', 'regex:/[0-9]+/', 'numeric', 'max:999999999', 'unique:personal'],
            'nombre' => ['required', 'string'],
            'apellido' => ['required', 'string'],
            'nro_telefono' => ['nullable', 'numeric', 'max:99999999999'],
            'email' => ['nullable', 'email'],
            'area' => ['required', 'string']
        ]);

        $ci = $request->input('ci');
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $nro_telefono = $request->input('nro_telefono');
        $correo_electronico = $request->input('email');
        $area = $request->input('area');

        $persona = new Personal();

        $persona->ci = $ci;
        $persona->nombre = $nombre;
        $persona->apellido = $apellido;
        $persona->nro_telefono = $nro_telefono;
        $persona->correo_electronico = $correo_electronico;
        $persona->area = $area;

        $persona->save();

        return redirect()->route('personal.index')->with(['message' => '<i class="bi bi-check-circle-fill"></i> Personal registrado exitosamente']);
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
        $persona = Personal::find($id);
        
        if ($persona) {
            return view('personal.edit', [
                'persona' => $persona
            ]);
        }

        return redirect()->route('personal.index')->with(['message' => '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error inesperado']);
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
            'ci' => ['required', 'regex:/[0-9]+/', 'numeric', 'max:999999999', 'unique:personal,ci,'.$id],
            'nombre' => ['required', 'string'],
            'apellido' => ['required', 'string'],
            'nro_telefono' => ['nullable', 'numeric', 'max:99999999999'],
            'email' => ['nullable', 'email'],
            'area' => ['required', 'string']
        ]);

        $ci = $request->input('ci');
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $nro_telefono = $request->input('nro_telefono');
        $correo_electronico = $request->input('email');
        $area = $request->input('area');

        $persona = Personal::find($id);

        $persona->ci = $ci;
        $persona->nombre = $nombre;
        $persona->apellido = $apellido;
        $persona->nro_telefono = $nro_telefono;
        $persona->correo_electronico = $correo_electronico;
        $persona->area = $area;

        $persona->save();

        return redirect()->route('personal.index')->with(['message' => '<i class="bi bi-check-circle-fill"></i> Personal registrado exitosamente']);
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
        $persona = Personal::find($id);

        if ($user && $persona) {

            $persona->delete();
            $message = '<i class="bi bi-check-circle-fill"></i> Registro eliminado satisfactoriamente';

        } else {

            $message = '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error al eliminar';

        }

        return redirect()->route('personal.index')->with([
            'message' => $message
        ]);
    }
}
