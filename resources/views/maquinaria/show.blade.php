@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @include('includes.message')
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-7">
                        <h4>Detalles de la máquina</h4>
                    </div>
                    <div class="col-md-5 text-right">
                        <button type="button" class="btn btn-danger imprimir"><i class="bi bi-printer"></i> Imprimir</button>
                        <a href="{{ route('maquinaria.edit', $maquina->id) }}" class="btn btn-info"><i class="bi bi-pencil"></i> &nbsp;Editar</a>
                        <a href="#" onclick="history.back();" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar</a>
                    </div>
                </div>

                <div class="card-body px-3">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <h5>{{$maquina->nombre.' '.$maquina->marca.' '.$maquina->modelo}}</h5>
                            <span>Serial institucional: {{$maquina->serial_institucion}}</span><br>
                        </div>
                        <div class="col-md-6 text-right">
                            <h5 class="mr-3">Máquina #{{$maquina->id}}</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-md-6 row">
                            <div class="col-md-5 text-right">
                                <span><b>Nombre:</b></span>
                            </div>
                            <div class="col-md-7">
                                <span>{{$maquina->nombre}}</span>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5 text-right">
                                <span><b>Serial de la máquina:</b></span>
                            </div>
                            <div class="col-md-7">
                                <span>{{$maquina->serial_institucion}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 row">
                            <div class="col-md-5  text-right">
                                <span><b>Marca:</b></span>
                            </div>
                            <div class="col-md-7">
                                <span>{{$maquina->marca}}</span>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5 text-right">
                                <span><b>Capacidad:</b></span>
                            </div>
                            <div class="col-md-7">
                                <span>{{$maquina->capacidad.' '.$maquina->capacidad_medida}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6 row">
                            <div class="col-md-5 text-right">
                                <span><b>Modelo:</b></span>
                            </div>
                            <div class="col-md-7">
                                <span>{{$maquina->modelo}}</span>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5 text-right">
                                <span><b>Condición:</b></span>
                            </div>
                            <div class="col-md-7">
                                <span>{{$maquina->condicion}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 mb-5">
                        <div class="col-md-2 ml-2 text-right">
                            <span><b>Observacion:</b></span>
                        </div>
                        <div class="col-md-10">
                            <span>{{$maquina->observacion}}</span>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <hr>
                        <div class="col-md-6">
                            <h5>Planes de mantenimiento asociados</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr class="table-danger">
                                            <th>Codigo</th>
                                            <th>Fecha</th>
                                            <th>Tipo de mantenimiento</th>
                                            <th>Prioridad</th>
                                            <th>Estatus</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($planes)>0)
                                            @foreach($planes as $plan)
                                                <tr>
                                                    <td>{{$plan->id}}</td>
                                                    <td>{{$plan->fecha}}</td>
                                                    <td>{{$plan->tipo_mantenimiento}}</td>
                                                    <td>{{$plan->criticidad}}</td>
                                                    <td>{{$plan->estatus}}</td>
                                                    <td title="Ver más"><a href="{{route('plan_mantenimiento.show', $plan->id)}}" title="Ver más" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5">No hay planes de mantenimiento asociados a esta máquina</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
