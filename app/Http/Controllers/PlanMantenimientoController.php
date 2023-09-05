<?php

namespace App\Http\Controllers;

use App\Compra_Repuesto;
use App\Maquinaria;
use Illuminate\Http\Request;
use App\Plan_Mantenimiento;
use App\Personal;
use App\Herramienta;
use App\Repuesto;
use App\Personal_Plan;
use App\Herramienta_Plan;
use App\Repuesto_Plan_NM;
use Illuminate\Support\Carbon;

class PlanMantenimientoController extends Controller
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
        $planes = Plan_Mantenimiento::join('maquinaria', 'plan_mantenimiento.id_maquina','maquinaria.id')
                                            ->select(['plan_mantenimiento.id', 'plan_mantenimiento.fecha', 'plan_mantenimiento.tipo_mantenimiento','plan_mantenimiento.criticidad', 'plan_mantenimiento.estatus', 'maquinaria.nombre', 'maquinaria.marca', 'maquinaria.modelo'])
                                            ->orderBy('plan_mantenimiento.id', 'desc')
                                            ->get();
        return view('planes_mantenimiento.index', [
            'planes' => $planes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maquinaria = Maquinaria::all();
        $personal = Personal::all();
        $herramientas = Herramienta::all();
        $repuestos = Repuesto::all();
        return view('planes_mantenimiento.create', [
            'maquinaria' => $maquinaria,
            'personal' => $personal,
            'herramientas' => $herramientas,
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
            'id_maquina' => ['required', 'numeric'],
            'id-personal0' => ['required', 'numeric'],
            'id-personal1' => ['nullable', 'numeric'],
            'id-personal2' => ['nullable', 'numeric'],
            'id-personal3' => ['nullable', 'numeric'],
            'id-personal4' => ['nullable', 'numeric'],
            'id-personal5' => ['nullable', 'numeric'],
            'id-personal6' => ['nullable', 'numeric'],
            'id-personal7' => ['nullable', 'numeric'],
            'id-personal8' => ['nullable', 'numeric'],
            'id-personal9' => ['nullable', 'numeric'],
            'id-herramientas0' => ['required', 'numeric'],
            'id-herramientas1' => ['nullable', 'numeric'],
            'id-herramientas2' => ['nullable', 'numeric'],
            'id-herramientas3' => ['nullable', 'numeric'],
            'id-herramientas4' => ['nullable', 'numeric'],
            'id-herramientas5' => ['nullable', 'numeric'],
            'id-herramientas6' => ['nullable', 'numeric'],
            'id-herramientas7' => ['nullable', 'numeric'],
            'id-herramientas8' => ['nullable', 'numeric'],
            'id-herramientas9' => ['nullable', 'numeric'],
            'id-repuestos0' => ['nullable', 'numeric'],
            'id-repuestos1' => ['nullable', 'numeric'],
            'id-repuestos2' => ['nullable', 'numeric'],
            'id-repuestos3' => ['nullable', 'numeric'],
            'id-repuestos4' => ['nullable', 'numeric'],
            'id-repuestos5' => ['nullable', 'numeric'],
            'id-repuestos6' => ['nullable', 'numeric'],
            'id-repuestos7' => ['nullable', 'numeric'],
            'id-repuestos8' => ['nullable', 'numeric'],
            'id-repuestos9' => ['nullable', 'numeric'],
            'fecha' => ['required', 'date'],
            'tipo_mantenimiento' => ['required', 'string', 'max:11'],
            'criticidad' => ['required', 'string', 'max:10'],
            'estatus' => ['required', 'string', 'max:11'],
            'descripcion' => ['nullable', 'string']
        ]);

        $id_maquina = $request->input('id_maquina');

        $id_personal0 = $request->input('id-personal0');
        $id_personal1 = $request->input('id-personal1');
        $id_personal2 = $request->input('id-personal2');
        $id_personal3 = $request->input('id-personal3');
        $id_personal4 = $request->input('id-personal4');
        $id_personal5 = $request->input('id-personal5');
        $id_personal6 = $request->input('id-personal6');
        $id_personal7 = $request->input('id-personal7');
        $id_personal8 = $request->input('id-personal8');
        $id_personal9 = $request->input('id-personal9');

        $id_herramientas0 = $request->input('id-herramientas0');
        $id_herramientas1 = $request->input('id-herramientas1');
        $id_herramientas2 = $request->input('id-herramientas2');
        $id_herramientas3 = $request->input('id-herramientas3');
        $id_herramientas4 = $request->input('id-herramientas4');
        $id_herramientas5 = $request->input('id-herramientas5');
        $id_herramientas6 = $request->input('id-herramientas6');
        $id_herramientas7 = $request->input('id-herramienestatustas7');
        $id_herramientas8 = $request->input('id-herramientas8');
        $id_herramientas9 = $request->input('id-herramientas9');

        $id_repuesto0 = $request->input('id-repuestos0');
        $id_repuesto1 = $request->input('id-repuestos1');
        $id_repuesto2 = $request->input('id-repuestos2');
        $id_repuesto3 = $request->input('id-repuestos3');
        $id_repuesto4 = $request->input('id-repuestos4');
        $id_repuesto5 = $request->input('id-repuestos5');
        $id_repuesto6 = $request->input('id-repuestos6');
        $id_repuesto7 = $request->input('id-repuestos7');
        $id_repuesto8 = $request->input('id-repuestos8');
        $id_repuesto9 = $request->input('id-repuestos9');

        $fecha = $request->input('fecha');
        $tipo_mantenimiento = $request->input('tipo_mantenimiento');
        $criticidad = $request->input('criticidad');
        $estatus = $request->input('estatus');
        $descripcion = $request->input('descripcion');

        $plan_mantenimiento = new Plan_Mantenimiento();

        $plan_mantenimiento->fecha = $fecha;
        $plan_mantenimiento->tipo_mantenimiento = $tipo_mantenimiento;
        $plan_mantenimiento->criticidad = $criticidad;
        $plan_mantenimiento->descripcion = $descripcion;
        $plan_mantenimiento->estatus = $estatus;
        $plan_mantenimiento->id_maquina = $id_maquina;

        $plan_mantenimiento->save();

        $id_nuevo_plan = Plan_Mantenimiento::orderBy('id', 'desc')->select('id')->first();

        $personal_plan = new Personal_Plan();
        $personal_plan->id_personal = $id_personal0;
        $personal_plan->id_plan = $id_nuevo_plan->id;
        $personal_plan->save();

        for ($i=1; $i < 10; $i++) { 
            if (isset(${"id_personal".$i})) {
                $personal_plan1 = new Personal_Plan();
                $personal_plan1->id_personal = ${"id_personal".$i};
                $personal_plan1->id_plan = $id_nuevo_plan->id;
                $personal_plan1->save();
            }
        }

        $herramienta_plan = new Herramienta_Plan();
        $herramienta_plan->id_herramienta = $id_herramientas0;
        $herramienta_plan->id_plan = $id_nuevo_plan->id;
        $herramienta_plan->save();

        for ($i=1; $i < 10; $i++) { 
            if (isset(${"id_herramientas".$i})) {
                $herramienta_plan1 = new Herramienta_Plan();
                $herramienta_plan1->id_herramienta = ${"id_herramientas".$i};
                $herramienta_plan1->id_plan = $id_nuevo_plan->id;
                $herramienta_plan1->save();
            }
        }

        for ($i=0; $i < 10; $i++) { 
            if (isset(${"id_repuesto".$i})) {
                $repuesto_plan = new Repuesto_Plan_NM();
                $repuesto_plan->id_repuesto = ${"id_repuesto".$i};
                $repuesto_plan->id_plan = $id_nuevo_plan->id;
                $repuesto_plan->save();
            }
        }
        
        return redirect()->route('plan_mantenimiento.index')->with(['message' => '<i class="bi bi-check-circle-fill"></i> Plan de Mantenimiento creado exitosamente']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan_mantenimiento = Plan_Mantenimiento::find($id);
        $maquina = Maquinaria::find($plan_mantenimiento->id_maquina);

        $personal = Personal_Plan::join('personal', 'personal_plan.id_personal', 'personal.id')
                                    ->where('id_plan', $id)
                                    ->get();

        $herramientas = Herramienta_Plan::join('herramientas', 'herramienta_plan.id_herramienta', 'herramientas.id')
                                    ->where('id_plan', $id)
                                    ->get();
        
        $repuestos_stock = Repuesto_Plan_NM::join('repuestos', 'repuestos_plan_nm.id_repuesto', 'repuestos.id')
                                    ->where('id_plan', $id)
                                    ->get();

        $repuestos_compra = Compra_Repuesto::join('compra_repuestos_nm', 'compra_repuestos.id', 'compra_repuestos_nm.id_compra_repuesto')
                                            ->join('repuestos', 'compra_repuestos.id', 'repuestos.id')
                                            ->where('compra_repuestos.id_plan', $id)
                                            ->select(['repuestos.nombre', 'repuestos.dimensiones', 'repuestos.dimensiones_medida', 'repuestos.capacidad', 'repuestos.capacidad_medida'])
                                            ->get();

        return view('planes_mantenimiento.details', [
            'plan_mantenimiento' => $plan_mantenimiento,
            'maquina' => $maquina,
            'personal' => $personal,
            'herramientas' => $herramientas,
            'repuestos_stock' => $repuestos_stock,
            'repuestos_compra' => $repuestos_compra,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan_mantenimiento = Plan_Mantenimiento::find($id);

        if (!$plan_mantenimiento) {
            return redirect()->route('plan_mantenimiento.index');
        }
        
        $maquinaria = Maquinaria::all();
        $maquina_selected = Maquinaria::find($plan_mantenimiento->id_maquina);
        $personal = Personal::all();
        //Ademas de obtener todo el personal para llenar los select, tambien debo buscar los que corresponden a este registro
        //de esa manera los puedo marcar como seleccionados
        $personal_selected = Personal_Plan::join('personal', 'personal_plan.id_personal', 'personal.id')
                                    ->where('id_plan', $id)
                                    ->select('personal.id')
                                    ->get();
        //llenar un array con la lista de personas correspondientes a este plan en especifico
        foreach($personal_selected as $persona) {
            $arrayPersonal[] = $persona->id;
            
        }
        //El mismo caso con las herramientas
        $herramientas = Herramienta::all();
        $herramientas_selected = Herramienta_Plan::join('herramientas', 'herramienta_plan.id_herramienta', 'herramientas.id')
                                    ->where('id_plan', $id)
                                    ->select('herramientas.id')
                                    ->get();
        foreach($herramientas_selected as $herramienta) {
            $arrayHerramienta[] = $herramienta->id;
        }
        //y con los repuestos tambien
        $repuestos = Repuesto::all();
        $repuestos_selected = Repuesto_Plan_NM::join('repuestos', 'repuestos_plan_nm.id_repuesto', 'repuestos.id')
                                    ->where('id_plan', $id)
                                    ->select('repuestos.id')
                                    ->get();
        //Puede que al hacer un mantenimiento no se requiera ningun repuesto, por eso es preciso declarar el array en falso, para
        //que arrayRepuestos quede definida y no muestre un error                            
        if (count($repuestos_selected)>0) {
            foreach($repuestos_selected as $repuesto) {
                $arrayRepuestos[] = $repuesto->id;
            }
        } else {
            $arrayRepuestos[] = false;
        }
        

        return view('planes_mantenimiento.edit', [
            'plan_mantenimiento' => $plan_mantenimiento,
            'maquinaria' => $maquinaria,
            'maquina_selected' => $maquina_selected->id,
            'personal' => $personal,
            'personal_selected' => $arrayPersonal,
            'herramientas' => $herramientas,
            'herramientas_selected' => $arrayHerramienta,
            'repuestos' => $repuestos,
            'repuestos_selected' => $arrayRepuestos
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
        //Primero busco el objeto que quiero actualizar e instancio el objeto junto con el usuario que hace la peticion
        $plan_mantenimiento = Plan_Mantenimiento::find($id);
        $user = \Auth::user();

        if ($user && $plan_mantenimiento) {
            $validate = $this->validate($request, [
            'id_maquina' => ['required', 'numeric'],
            'id-personal0' => ['required', 'numeric'],
            'id-personal1' => ['nullable', 'numeric'],
            'id-personal2' => ['nullable', 'numeric'],
            'id-personal3' => ['nullable', 'numeric'],
            'id-personal4' => ['nullable', 'numeric'],
            'id-personal5' => ['nullable', 'numeric'],
            'id-personal6' => ['nullable', 'numeric'],
            'id-personal7' => ['nullable', 'numeric'],
            'id-personal8' => ['nullable', 'numeric'],
            'id-personal9' => ['nullable', 'numeric'],
            'id-herramientas0' => ['required', 'numeric'],
            'id-herramientas1' => ['nullable', 'numeric'],
            'id-herramientas2' => ['nullable', 'numeric'],
            'id-herramientas3' => ['nullable', 'numeric'],
            'id-herramientas4' => ['nullable', 'numeric'],
            'id-herramientas5' => ['nullable', 'numeric'],
            'id-herramientas6' => ['nullable', 'numeric'],
            'id-herramientas7' => ['nullable', 'numeric'],
            'id-herramientas8' => ['nullable', 'numeric'],
            'id-herramientas9' => ['nullable', 'numeric'],
            'id-repuestos0' => ['nullable', 'numeric'],
            'id-repuestos1' => ['nullable', 'numeric'],
            'id-repuestos2' => ['nullable', 'numeric'],
            'id-repuestos3' => ['nullable', 'numeric'],
            'id-repuestos4' => ['nullable', 'numeric'],
            'id-repuestos5' => ['nullable', 'numeric'],
            'id-repuestos6' => ['nullable', 'numeric'],
            'id-repuestos7' => ['nullable', 'numeric'],
            'id-repuestos8' => ['nullable', 'numeric'],
            'id-repuestos9' => ['nullable', 'numeric'],
            'fecha' => ['required', 'date'],
            'tipo_mantenimiento' => ['required', 'string', 'max:11'],
            'criticidad' => ['required', 'string', 'max:10'],
            'estatus' => ['required', 'string', 'max:11'],
            'descripcion' => ['nullable', 'string']
            ]);

            $id_maquina = $request->input('id_maquina');

            $id_personal0 = $request->input('id-personal0');
            $id_personal1 = $request->input('id-personal1');
            $id_personal2 = $request->input('id-personal2');
            $id_personal3 = $request->input('id-personal3');
            $id_personal4 = $request->input('id-personal4');
            $id_personal5 = $request->input('id-personal5');
            $id_personal6 = $request->input('id-personal6');
            $id_personal7 = $request->input('id-personal7');
            $id_personal8 = $request->input('id-personal8');
            $id_personal9 = $request->input('id-personal9');

            $id_herramientas0 = $request->input('id-herramientas0');
            $id_herramientas1 = $request->input('id-herramientas1');
            $id_herramientas2 = $request->input('id-herramientas2');
            $id_herramientas3 = $request->input('id-herramientas3');
            $id_herramientas4 = $request->input('id-herramientas4');
            $id_herramientas5 = $request->input('id-herramientas5');
            $id_herramientas6 = $request->input('id-herramientas6');
            $id_herramientas7 = $request->input('id-herramienestatustas7');
            $id_herramientas8 = $request->input('id-herramientas8');
            $id_herramientas9 = $request->input('id-herramientas9');

            $id_repuesto0 = $request->input('id-repuestos0');
            $id_repuesto1 = $request->input('id-repuestos1');
            $id_repuesto2 = $request->input('id-repuestos2');
            $id_repuesto3 = $request->input('id-repuestos3');
            $id_repuesto4 = $request->input('id-repuestos4');
            $id_repuesto5 = $request->input('id-repuestos5');
            $id_repuesto6 = $request->input('id-repuestos6');
            $id_repuesto7 = $request->input('id-repuestos7');
            $id_repuesto8 = $request->input('id-repuestos8');
            $id_repuesto9 = $request->input('id-repuestos9');

            $fecha = $request->input('fecha');
            $tipo_mantenimiento = $request->input('tipo_mantenimiento');
            $criticidad = $request->input('criticidad');
            $estatus = $request->input('estatus');
            $descripcion = $request->input('descripcion');

            $plan_mantenimiento->fecha = $fecha;
            $plan_mantenimiento->tipo_mantenimiento = $tipo_mantenimiento;
            $plan_mantenimiento->criticidad = $criticidad;
            $plan_mantenimiento->descripcion = $descripcion;
            $plan_mantenimiento->estatus = $estatus;
            $plan_mantenimiento->id_maquina = $id_maquina;

            $plan_mantenimiento->update();

            //Se hace mas sencillo eliminar todo el personal asociado al plan anterior y volverlo a crear y asociar
            //al plan actualizado
            Personal_Plan::where('id_plan', $id)->delete();
            Herramienta_Plan::where('id_plan', $id)->delete();
            Repuesto_Plan_NM::where('id_plan', $id)->delete();

            //Crear otra vez los registros asociados al plan
            $personal_plan = new Personal_Plan();
            $personal_plan->id_personal = $id_personal0;
            $personal_plan->id_plan = $id;
            $personal_plan->save();

            for ($i=1; $i < 10; $i++) { 
                if (isset(${"id_personal".$i})) {
                    $personal_plan1 = new Personal_Plan();
                    $personal_plan1->id_personal = ${"id_personal".$i};
                    $personal_plan1->id_plan = $id;
                    $personal_plan1->save();
                }
            }

            $herramienta_plan = new Herramienta_Plan();
            $herramienta_plan->id_herramienta = $id_herramientas0;
            $herramienta_plan->id_plan = $id;
            $herramienta_plan->save();

            for ($i=1; $i < 10; $i++) { 
                if (isset(${"id_herramientas".$i})) {
                    $herramienta_plan1 = new Herramienta_Plan();
                    $herramienta_plan1->id_herramienta = ${"id_herramientas".$i};
                    $herramienta_plan1->id_plan = $id;
                    $herramienta_plan1->save();
                }
            }

            for ($i=0; $i < 10; $i++) { 
                if (isset(${"id_repuesto".$i})) {
                    $repuesto_plan = new Repuesto_Plan_NM();
                    $repuesto_plan->id_repuesto = ${"id_repuesto".$i};
                    $repuesto_plan->id_plan = $id;
                    $repuesto_plan->save();
                }
            }
            
            return redirect()->route('plan_mantenimiento.index')->with(['message' => '<i class="bi bi-check-circle-fill"></i> Plan de Mantenimiento actualizado exitosamente']);
        }

        //al llegar a este punto quiere decir que el id se ha modificado o no corresponde a un registro en la base de datos
        //para ello, devuelvo la vista plan_mantenimiento.index y muestro un mensaje de error
    
        return redirect()->route('plan_mantenimiento.index')
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
        $plan_mantenimiento = Plan_Mantenimiento::find($id);

        if ($user && $plan_mantenimiento) {

            $plan_mantenimiento->delete();
            $message = '<i class="bi bi-check-circle-fill"></i> Registro eliminado satisfactoriamente';

        } else {

            $message = '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error al eliminar';

        }

        return redirect()->route('plan_mantenimiento.index')->with([
            'message' => $message
        ]);
    }


    /**
     * Chequea si el plan de mantenimiento puede marcarse o no como completado dependiendo de la fecha
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkIfComplete($id)
    {   
        $user = \Auth::user();
        $plan_mantenimiento = Plan_Mantenimiento::find($id);
        $fechaHoy = Carbon::now()->format('Y-m-d');

        if ($user && $plan_mantenimiento) {
            
            if ($plan_mantenimiento->fecha >= $fechaHoy) {
                $message = '<i class="bi bi-exclamation-triangle-fill"></i> La fecha del plan esta en el futuro, no se puede marcar como completado. Cambia la fecha del plan e intenta nuevamente';
            } else {
                $plan_mantenimiento->estatus = 'Completado';
                $plan_mantenimiento->update();
                $message = '<i class="bi bi-check-circle-fill"></i> Registro editado con éxito';
            }
            
            return redirect()->route('plan_mantenimiento.show', $plan_mantenimiento->id)->with([
                'message' => $message
            ]);
        }
        
        return redirect()->route('plan_mantenimiento.index')->with([
                'message' => '<i class="bi bi-exclamation-triangle-fill"></i> Ocurrio un error inesperado'
            ]);
    }

    /**
     * Funcion que devuelve el calendario de planes de mantenimiento con sus respectivos datos
     *
     * @return \Illuminate\Http\Response
     */
    public function calendar()
    {
        $planes = Plan_Mantenimiento::orderBy('id', 'asc')->get();
        $str = '';
        foreach($planes as $plan) {
            $row = '{title: "Plan #'.$plan->id.'", url: "/plan_mantenimiento/detalles/'.$plan->id.'", start: "'.$plan->fecha.'"},';
            $str = $str.$row;
        }

        return view('planes_mantenimiento.calendar', [
            'planes' => $planes,
            'rows' => $str
        ]);
    }

}
