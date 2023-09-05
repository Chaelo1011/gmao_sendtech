<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taller;
use PhpParser\Node\Expr\New_;

class TalleresController extends Controller
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
        $talleres = Taller::all();
        return view('talleres.index', [
            'talleres' => $talleres
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('talleres.create');
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
            'area' => ['required', 'string']
        ]);

        $nombre = $request->input('nombre');
        $area = $request->input('area');

        $taller = new Taller();
        $taller->nombre = $nombre;
        $taller->area = $area;

        $taller->save();
        
        return redirect()->route('talleres.index')->with(['message' => '<i class="bi bi-check-circle-fill"></i> Taller registrado con exito']);
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
        $taller = Taller::find($id);

        if ($taller) {
            return view('talleres.edit', [
                'taller' => $taller
            ]);
        }

        return redirect()->route('talleres.index')->with(['message' => '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error inesperado']);
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
            'area' => ['required', 'string']
        ]);

        $nombre = $request->input('nombre');
        $area = $request->input('area');

        $taller = Taller::find($id);

        $taller->nombre = $nombre;
        $taller->area = $area;

        $taller->update();
        
        return redirect()->route('talleres.index')->with(['message' => '<i class="bi bi-check-circle-fill"></i> Taller actualizado con exito']);        
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
        $taller = Taller::find($id);

        if ($user && $taller) {

            $taller->delete();
            $message = '<i class="bi bi-check-circle-fill"></i> Registro eliminado satisfactoriamente';

        } else {

            $message = '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error al eliminar';

        }

        return redirect()->route('talleres.index')->with([
            'message' => $message
        ]);
    }
}
