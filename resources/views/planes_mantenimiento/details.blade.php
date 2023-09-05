@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @include('includes.message')
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-7">
                        <h4>Detalles del plan de mantenimiento</h4>
                    </div>
                    <div class="col-md-5 text-right">
                        <button type="button" class="btn btn-danger imprimir"><i class="bi bi-printer"></i> Imprimir</button>
                        <a href="{{ route('plan_mantenimiento.edit', $plan_mantenimiento->id) }}" class="btn btn-info"><i class="bi bi-pencil"></i> &nbsp;Editar</a>
                        <a href="#" class="btn btn-primary" onclick="history.back();"><i class="bi bi-arrow-left"></i> Regresar</a>
                    </div>
                </div>

                <div class="card-body px-3">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <h5>Plan de mantenimiento #{{$plan_mantenimiento->id}}</h5>
                            <span>Estatus: {{$plan_mantenimiento->estatus}}</span><br>
                            <span>Prioridad: {{$plan_mantenimiento->criticidad}}</span>
                        </div>
                        <div class="col-md-6 text-right">
                            <h5 class="mr-3 fecha">{{$plan_mantenimiento->fecha}}</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-md-6 row">
                            <div class="col-md-5 text-right">
                                <span><b>Máquina:</b></span>
                            </div>
                            <div class="col-md-7">
                                <span><a href="{{route('maquinaria.show', $maquina->id)}}">{{ $maquina->nombre.' '.$maquina->marca.' '.$maquina->modelo }}</a></span>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5 text-right">
                                <span><b>Tipo de mantenimiento:</b></span>
                            </div>
                            <div class="col-md-7">
                                <span>{{$plan_mantenimiento->tipo_mantenimiento}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 row">
                            <div class="col-md-5  text-right">
                                <span><b>Personal:</b></span>
                            </div>
                            <div class="col-md-7">
                                @foreach($personal as $persona)
                                    <p>{{$persona->ci.' - '.$persona->nombre.' '.$persona->apellido}}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5 text-right">
                                <span><b>Herramientas:</b></span>
                            </div>
                            <div class="col-md-7">
                                @foreach($herramientas as $herramienta)
                                    <p>{{$herramienta->nombre.' '.$herramienta->dimensiones.' '.$herramienta->dimensiones_medida.' '.$herramienta->capacidad.' '.$herramienta->capacidad_medida}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6 row">
                            <div class="col-md-5 text-right">
                                <span><b>Repuestos del stock:</b></span>
                            </div>
                            <div class="col-md-7">
                                @if(count($repuestos_stock) > 0 )
                                    @foreach($repuestos_stock as $repuesto_stock)
                                        <p>{{$repuesto_stock->nombre.' '.$repuesto_stock->dimensiones.' '.$repuesto_stock->dimensiones_medida.' '.$repuesto_stock->capacidad.' '.$repuesto_stock->capacidad_medida}}</p>
                                    @endforeach
                                @else
                                    <p>No hay repuestos en stock</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5 text-right">
                                <span><b>Repuestos comprados:</b></span>
                            </div>
                            <div class="col-md-7">
                                @if(count($repuestos_compra) > 0)
                                    @foreach($repuestos_compra as $repuesto_compra)
                                        <p>{{$repuesto_compra->nombre.' '.$repuesto_compra->dimensiones.' '.$repuesto_compra->dimensiones_medida.' '.$repuesto_compra->capacidad.' '.$repuesto_compra->capacidad_medida}}</p>
                                    @endforeach
                                @else
                                    <p>No hay repuestos comprados</p>
                                @endif
                                
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 mb-5">
                        <div class="col-md-2 text-right">
                            <span><b>Descripcion:</b></span>
                        </div>
                        <div class="col-md-10">
                            <span>{{$plan_mantenimiento->descripcion}}</span>
                        </div>
                    </div>

                    @if($plan_mantenimiento->estatus=='Pendiente')
                        <div class="row mt-4 mb-2">
                            <hr>
                            <div class="col-md-12 text-right">
                                <a href="{{route('plan_mantenimiento.complete', $plan_mantenimiento->id)}}" class="btn btn-danger complete"><i class="bi bi-check"></i> Marcar como completado</a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
