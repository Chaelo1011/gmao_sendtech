<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taller;
use App\Plan_Mantenimiento;
use App\Compra_Repuesto;
use App\Maquinaria;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $talleres = Taller::all();

        $planes_mantenimiento = DB::table('plan_mantenimiento')
                                ->join('maquinaria', 'plan_mantenimiento.id_maquina','maquinaria.id')
                                ->where('estatus', 'Pendiente')
                                ->orderBy('fecha', 'desc')
                                ->select(['plan_mantenimiento.id', 'plan_mantenimiento.fecha', 'plan_mantenimiento.tipo_mantenimiento','plan_mantenimiento.criticidad', 'maquinaria.nombre', 'maquinaria.marca', 'maquinaria.modelo'])
                                ->get();

        $planes_completados = Plan_Mantenimiento::where('estatus', 'Completado')->count();

        $compra_repuestos = Compra_Repuesto::where('estatus', 'En encargo')->orderBy('fecha_compra', 'desc')->get();

        $maquinas_registradas = Maquinaria::all()->count();

        $repuestos = DB::table('compra_repuestos')
                            ->join('compra_repuestos_nm', 'compra_repuestos.id', 'compra_repuestos_nm.id_compra_repuesto')
                            ->join('repuestos', 'compra_repuestos_nm.id_repuesto', 'repuestos.id')
                            ->select(['compra_repuestos.id', 'repuestos.nombre'])
                            ->orderBy('compra_repuestos.fecha_compra', 'desc')
                            ->where('estatus', 'En encargo')
                            ->get();
                            
        $repuestos_comprados = DB::table('compra_repuestos')
                            ->join('compra_repuestos_nm', 'compra_repuestos.id', 'compra_repuestos_nm.id_compra_repuesto')
                            ->join('repuestos', 'compra_repuestos_nm.id_repuesto', 'repuestos.id')
                            ->select(['compra_repuestos.id', 'repuestos.nombre'])
                            ->orderBy('compra_repuestos.fecha_compra', 'desc')
                            ->where('estatus', 'En encargo')
                            ->count();
       
        return view('home', [
            'talleres' => $talleres,
            'planes' => $planes_mantenimiento,
            'planes_completados' => $planes_completados,
            'compra_repuestos' => $compra_repuestos,
            'repuestos_comprados' => $repuestos_comprados,
            'repuestos'=> $repuestos,
            'maquinas_registradas' => $maquinas_registradas
        ]);
    }
}
