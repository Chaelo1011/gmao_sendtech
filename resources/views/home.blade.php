@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 row">
                            <div class="col-md-2 col-sm-6 col-xs-3">
                                <img src="{{asset('img/logo.jpeg')}}" class="rounded-circle logo_rounded" alt="Logo" style="width: 100%;">
                            </div>
                            <div class="col-md-8">
                                <h2 style="display: inline;">{{ env('APP_NAME') }}</h2>
                                <h5>Bienvenido(a), {{ Auth::user()->name }}</h5>
                                <p>Hoy es: {{ date('d-m-Y') }}</p>
                            </div>
                        </div>
                    </div>
                    @if (is_null($talleres))
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h5>Para comenzar, debes registrar un taller</h5>
                                <a href="" class="btn btn-primary">Registrar taller</a>
                            </div>
                        </div>
                    @else
                        <div class="row text-center mt-4">
                            <div class="col-md-4">
                                <div class="boxed">
                                    <h5>Mantenimientos completados</h5>
                                    <span>{{$planes_completados}}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="boxed">
                                    <h5>Maquinas en stock</h5>
                                    <span>{{ $maquinas_registradas }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="boxed">
                                    <h5>Repuestos comprados</h5>
                                    <span>{{ $repuestos_comprados  }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-9">
                                <h5>Próximos planes de mantenimiento</h5>
                            </div>
                            <div class="col-md-3 text-right">
                                <a href="{{route('plan_mantenimiento.index')}}" class="btn btn-primary">Ver todo</a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr class="table-danger">
                                                <th>Código</th>
                                                <th>Fecha</th>
                                                <th>Maquina</th>
                                                <th>Tipo Mantenimiento</th>
                                                <th>Prioridad</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($planes as $plan)
                                            <tr>
                                                <td>{{$plan->id}}</td>
                                                <td>{{$plan->fecha}}</td>
                                                <td>{{$plan->nombre." ".$plan->marca." ".$plan->modelo}}</td>
                                                <td>{{$plan->tipo_mantenimiento}}</td>
                                                <td>{{$plan->criticidad}}</td>
                                                <td><a class="btn btn-sm btn-info" href="{{route('plan_mantenimiento.show', $plan->id)}}"><i class="bi bi-eye"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-9">
                                <h5>Compra de repuestos pendientes</h5>
                            </div>
                            <div class="col-md-3 text-right">
                                <a href="{{route('compra_repuestos.index')}}" class="btn btn-primary">Ver todo</a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr class="table-danger">
                                                <th>Codigo</th>
                                                <th>Fecha de compra</th>
                                                <th>Repuestos</th>
                                                <th>Costo total</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if (is_null($compra_repuestos))
                                <tr>
                                    <td colspan="5" class="text-center">No hay compras registradas</td>
                                </tr>
                                @else
                                    @foreach ($compra_repuestos as $compra)
                                        <tr>
                                            <td>{{ $compra->id }}</td>
                                            <td>{{ $compra->fecha_compra }}</td>
                                            <td><?php
                                                $str = '';
                                                foreach ($repuestos as $repuesto) {
                                                    if ($compra->id == $repuesto->id) {
                                                        $str = $str.''.$repuesto->nombre.", ";
                                                    }
                                                } echo trim($str, ', ').'.';
                                            ?></td>
                                            <td>{{ $compra->costo_total." Bs" }}</td>
                                            <td><a class="btn btn-sm btn-info" href="{{route('compra_repuestos.show', $compra->id)}}"><i class="bi bi-eye"></i></a></td>
                                            
                                        </tr>   
                                    @endforeach
                                @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
