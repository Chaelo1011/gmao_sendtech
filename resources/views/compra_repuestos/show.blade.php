@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @include('includes.message')
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-7">
                        <h4>Detalles de la compra de repuestos</h4>
                    </div>
                    <div class="col-md-5 text-right">
                        <button type="button" class="btn btn-danger imprimir"><i class="bi bi-printer"></i> Imprimir</button>
                        <a href="{{ route('compra_repuestos.edit', $compra->id) }}" class="btn btn-info"><i class="bi bi-pencil"></i> &nbsp;Editar</a>
                        <a href="#" class="btn btn-primary" onclick="history.back();"><i class="bi bi-arrow-left"></i> Regresar</a>
                    </div>
                </div>

                <div class="card-body px-3">
                    <div class="row mt-2">
                        <div class="col-md-8">
                            <h5>Compra de repuestos #{{$compra->id}}</h5>
                            <span>Plan de mantenimiento: #{{$plan_mantenimiento->id.' | '.$plan_mantenimiento->nombre.' '.$plan_mantenimiento->marca.' '.$plan_mantenimiento->modelo}}</span><br>
                            <span>Estatus: {{$compra->estatus}}</span><br>
                            <span>Medio de pago: {{$compra->medio_pago}}</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <h5 class="mr-3 fecha">{{$compra->fecha_compra}}</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5>Repuestos</h5>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @foreach($repuestos as $repuesto)
                                            <tr>
                                                <td># {{$repuesto->id}}</td>
                                                <td>{{$repuesto->nombre.' '.$repuesto->dimensiones.' '.$repuesto->dimensiones_medida}}</td>
                                                <td>{{$repuesto->costo_estimado}} Bs</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Totales</th>
                                            <th>{{count($repuestos)}}</th>
                                            <th>{{floatval($compra->costo_total)}} Bs</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    

                    @if($compra->estatus=='En encargo')
                        <div class="row mt-4 mb-2">
                            <hr>
                            <div class="col-md-12 text-right">
                                <a href="{{ route('compra_repuestos.complete', $compra->id) }}" class="btn btn-danger complete"><i class="bi bi-check"></i> Marcar como pagado y recibido</a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
