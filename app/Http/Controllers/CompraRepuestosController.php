<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra_Repuesto;
use App\Compra_Repuestos_NM;
use App\Repuesto;
use App\Plan_Mantenimiento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CompraRepuestosController extends Controller
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
        $repuestos = DB::table('compra_repuestos')
                            ->join('compra_repuestos_nm', 'compra_repuestos.id', 'compra_repuestos_nm.id_compra_repuesto')
                            ->join('repuestos', 'compra_repuestos_nm.id_repuesto', 'repuestos.id')
                            ->select(['compra_repuestos.id', 'repuestos.nombre', 'repuestos.capacidad', 'repuestos.capacidad_medida'])
                            ->orderBy('compra_repuestos.id', 'desc')
                            ->get();     

        $compra_repuestos = Compra_Repuesto::orderBy('id', 'desc')->get();
        return view('compra_repuestos.index', [
            'compra_repuestos' => $compra_repuestos,
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
        $planes = Plan_Mantenimiento::join('maquinaria', 'plan_mantenimiento.id_maquina', 'maquinaria.id')
                                    ->select(['plan_mantenimiento.id', 'plan_mantenimiento.fecha', 'maquinaria.nombre', 'maquinaria.marca', 'maquinaria.modelo'])
                                    ->get();
                                    
        $repuestos = Repuesto::all();

        return view('compra_repuestos.create', [
            'planes' => $planes,
            'repuestos' => $repuestos
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
            'id_plan' => ['required', 'numeric'],
            'fecha' => ['required', 'date'],
            'id_repuesto0' => ['required', 'string', 'regex:/[0-9.,]+-[0-9.,]+/'],
            'id_repuesto1' => ['nullable', 'string', 'regex:/[0-9.,]+-[0-9.,]+/'],
            'id_repuesto2' => ['nullable', 'string', 'regex:/[0-9.,]+-[0-9.,]+/'],
            'id_repuesto3' => ['nullable', 'string', 'regex:/[0-9.,]+-[0-9.,]+/'],
            'id_repuesto4' => ['nullable', 'string', 'regex:/[0-9.,]+-[0-9.,]+/'],
            'medio_pago' => ['required', 'string', 'max:14'],
            'estatus' => ['required', 'string', 'max:11']
        ]);
        
        $id_plan = $request->input('id_plan');
        $fecha = $request->input('fecha');
        $id_repuesto0 = $request->input('id_repuesto0');
        $id_repuesto1 = $request->input('id_repuesto1');
        $id_repuesto2 = $request->input('id_repuesto2');
        $id_repuesto3 = $request->input('id_repuesto3');
        $id_repuesto4 = $request->input('id_repuesto4');

        for ($i = 0; $i < 5; $i++) {
            if (isset(${'id_repuesto'.$i})) {
                ${'id_repuesto'.$i} = explode('-', $request->input('id_repuesto'.$i));
            } else {
                ${'id_repuesto'.$i} = ['', 0];
            }
        }
        $medio_pago = $request->input('medio_pago');
        $estatus = $request->input('estatus');

        $suma = 0;        
        for ($i=0; $i < 5; $i++) { 
            if (isset(${"id_repuesto".$i})) {
                $suma = $suma+${'id_repuesto'.$i}[1];
            }
        }
        
        $compra = new Compra_Repuesto();

        $compra->fecha_compra = $fecha;
        $compra->costo_total = $suma;
        $compra->medio_pago = $medio_pago;
        $compra->estatus = $estatus;
        $compra->id_plan = $id_plan;

        $compra->save();

        $id_nueva_compra = Compra_Repuesto::orderBy('id', 'desc')->select('id')->first();
        $compra_nm = new Compra_Repuestos_NM();
        $compra_nm->id_repuesto = $id_repuesto0[0];
        $compra_nm->id_compra_repuesto = $id_nueva_compra->id;
        $compra_nm->save();

        for ($i=1; $i < 5; $i++) { 
            if (${"id_repuesto".$i}[0]!=='') {
                $compra_nm1 = new Compra_Repuestos_NM();
                $compra_nm1->id_repuesto = ${"id_repuesto".$i}[0];
                $compra_nm1->id_compra_repuesto = $id_nueva_compra->id;
                $compra_nm1->save();
            }
        }

        return redirect()->route('compra_repuestos.index')
                        ->with(['message'=>'<i class="bi bi-check-circle-fill"></i> Compra registrada exitosamente']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra = Compra_Repuesto::find($id);

        if ($compra) {
            $plan = Plan_Mantenimiento::join('maquinaria', 'plan_mantenimiento.id_maquina', 'maquinaria.id')
                                    ->where('plan_mantenimiento.id', $compra->id_plan)
                                    ->select(['plan_mantenimiento.id', 'plan_mantenimiento.fecha', 'maquinaria.nombre', 'maquinaria.marca', 'maquinaria.modelo'])
                                    ->first();

            $repuestos = DB::table('compra_repuestos')
                            ->join('compra_repuestos_nm', 'compra_repuestos.id', 'compra_repuestos_nm.id_compra_repuesto')
                            ->join('repuestos', 'compra_repuestos_nm.id_repuesto', 'repuestos.id')
                            ->where('compra_repuestos_nm.id_compra_repuesto', $id)
                            ->select(['repuestos.id', 'repuestos.nombre', 'repuestos.capacidad', 'repuestos.capacidad_medida', 'repuestos.dimensiones', 'repuestos.dimensiones_medida', 'repuestos.costo_estimado'])
                            ->orderBy('compra_repuestos.id', 'desc')
                            ->get();

            return view('compra_repuestos.show', [
                'compra' => $compra,
                'plan_mantenimiento' => $plan,
                'repuestos' => $repuestos
            ]);
        }

        return redirect()->route('compra_repuestos.index')->with(['message' => '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error inesperado']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \Auth::user();
        $compra = Compra_Repuesto::find($id);

        if ($user && $compra) {
            $planes = Plan_Mantenimiento::join('maquinaria', 'plan_mantenimiento.id_maquina', 'maquinaria.id')
                                    ->select(['plan_mantenimiento.id', 'plan_mantenimiento.fecha', 'maquinaria.nombre', 'maquinaria.marca', 'maquinaria.modelo'])
                                    ->get();
                                    
            $repuestos = Repuesto::all();
            $repuestos_selected = Compra_Repuesto::join('compra_repuestos_nm', 'compra_repuestos.id', 'compra_repuestos_nm.id_compra_repuesto')
                                    ->where('compra_repuestos_nm.id_compra_repuesto', $id)
                                    ->select(['compra_repuestos_nm.id_repuesto'])
                                    ->get();
            foreach ($repuestos_selected as $selected) {
                $arrayRepuestos[] = $selected->id_repuesto;
            }

            return view('compra_repuestos.edit', [
                'compra' => $compra,
                'planes' => $planes,
                'repuestos' => $repuestos,
                'repuestos_selected' => $arrayRepuestos
            ]);
        }

        return redirect()->route('compra_repuestos.index')
                        ->with(['message' => '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error inesperado']);
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
        $user = \Auth::user();
        $compra = Compra_Repuesto::find($id);

        if ($user && $compra) {
            $validate = $this->validate($request, [
                'id_plan' => ['required', 'numeric'],
                'fecha' => ['required', 'date'],
                'id_repuesto0' => ['required', 'string', 'regex:/[0-9.,]+-[0-9.,]+/'],
                'id_repuesto1' => ['nullable', 'string', 'regex:/[0-9.,]+-[0-9.,]+/'],
                'id_repuesto2' => ['nullable', 'string', 'regex:/[0-9.,]+-[0-9.,]+/'],
                'id_repuesto3' => ['nullable', 'string', 'regex:/[0-9.,]+-[0-9.,]+/'],
                'id_repuesto4' => ['nullable', 'string', 'regex:/[0-9.,]+-[0-9.,]+/'],
                'medio_pago' => ['required', 'string', 'max:14'],
                'estatus' => ['required', 'string', 'max:11']
            ]);
            
            $id_plan = $request->input('id_plan');
            $fecha = $request->input('fecha');
            $id_repuesto0 = $request->input('id_repuesto0');
            $id_repuesto1 = $request->input('id_repuesto1');
            $id_repuesto2 = $request->input('id_repuesto2');
            $id_repuesto3 = $request->input('id_repuesto3');
            $id_repuesto4 = $request->input('id_repuesto4');

            for ($i = 0; $i < 5; $i++) {
                if (isset(${'id_repuesto'.$i})) {
                    ${'id_repuesto'.$i} = explode('-', $request->input('id_repuesto'.$i));
                } else {
                    ${'id_repuesto'.$i} = ['', 0];
                }
            }
            $medio_pago = $request->input('medio_pago');
            $estatus = $request->input('estatus');

            $suma = 0;        
            for ($i=0; $i < 5; $i++) { 
                if (isset(${"id_repuesto".$i})) {
                    $suma = $suma+${'id_repuesto'.$i}[1];
                }
            }
            
            $compra->fecha_compra = $fecha;
            $compra->costo_total = $suma;
            $compra->medio_pago = $medio_pago;
            $compra->estatus = $estatus;
            $compra->id_plan = $id_plan;

            $compra->update();

            Compra_Repuestos_NM::where('id_compra_repuesto', $id)->delete();

            $compra_nm = new Compra_Repuestos_NM();
            $compra_nm->id_repuesto = $id_repuesto0[0];
            $compra_nm->id_compra_repuesto = $compra->id;
            $compra_nm->save();

            for ($i=1; $i < 5; $i++) { 
                if (${"id_repuesto".$i}[0]!=='') {
                    $compra_nm1 = new Compra_Repuestos_NM();
                    $compra_nm1->id_repuesto = ${"id_repuesto".$i}[0];
                    $compra_nm1->id_compra_repuesto = $compra->id;
                    $compra_nm1->save();
                }
            }

            return redirect()->route('compra_repuestos.index')
                        ->with(['message'=>'<i class="bi bi-check-circle-fill"></i> Compra actualizada exitosamente']);
        }

        return redirect()->route('compra_repuestos.index')
                        ->with(['message' => '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error inesperado']);
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
        $compra = Compra_Repuesto::find($id);

        if ($user && $compra) {

            $compra->delete();
            $message = '<i class="bi bi-check-circle-fill"></i> Registro eliminado satisfactoriamente';

        } else {

            $message = '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error al eliminar';

        }

        return redirect()->route('compra_repuestos.index')->with([
            'message' => $message
        ]);
    }


    /**
     * Chequea si la compra puede marcarse o no como completado dependiendo de la fecha
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkIfComplete($id)
    {   
        $user = \Auth::user();
        $compra = Compra_Repuesto::find($id);
        $fechaHoy = Carbon::now()->format('Y-m-d');

        if ($user && $compra) {
            
            if ($compra->fecha_compra >= $fechaHoy) {
                $message = '<i class="bi bi-exclamation-triangle-fill"></i> La fecha esta en el futuro, no se puede marcar como entregado. Cambia la fecha e intenta nuevamente';
            } else {
                $compra->estatus = 'Pago';
                $compra->update();
                $message = '<i class="bi bi-check-circle-fill"></i> Registro editado con éxito';
            }
            
            return redirect()->route('compra_repuestos.show', $compra->id)->with([
                'message' => $message
            ]);
        }
        
        return redirect()->route('compra_repuestos.index')->with([
                'message' => '<i class="bi bi-exclamation-triangle-fill"></i> Ocurrio un error inesperado'
            ]);
    }
}
