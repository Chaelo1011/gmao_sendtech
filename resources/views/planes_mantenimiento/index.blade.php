@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @include('includes.message')
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-8">
                        <h4>Planes de mantenimiento</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        @if(!is_null($planes)) <a href="{{ route('plan_mantenimiento.calendar') }}" class="btn btn-info"><i class="bi bi-calendar-week"></i></a> @endif
                        <a href="{{ route('plan_mantenimiento.create') }}" class="btn btn-primary">Registrar nuevo plan</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table dataTable table-hover table-striped">
                            <thead>
                                <tr class="table-danger">
                                    <th>Código</th>
                                    <th>Fecha</th>
                                    <th>Maquina</th>
                                    <th>Tipo de mantenimiento</th>
                                    <th>Prioridad</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (is_null($planes))
                                <tr>
                                    <td colspan="6" class="text-center">No hay planes de mantenimiento registrados</td>
                                </tr>
                                @else
                                @foreach($planes as $plan)
                                            <tr>
                                                <td>{{$plan->id}}</td>
                                                <td>{{$plan->fecha}}</td>
                                                <td>{{$plan->nombre." ".$plan->marca." ".$plan->modelo}}</td>
                                                <td>{{$plan->tipo_mantenimiento}}</td>
                                                <td>{{$plan->criticidad}}</td>
                                                <td>{{$plan->estatus}}</td>
                                            <td>
                                                <div class="acciones">
                                                    <a href="{{ route('plan_mantenimiento.show', $plan->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Ver más detalles"><i class="bi bi-eye"></i></a>
                                                    <a href="{{ route('plan_mantenimiento.edit', ['id' => $plan->id]) }}" class="btn btn-primary btn-sm editar"><i class="bi bi-pencil"></i></a>
                                                    <form action="{{ route('plan_mantenimiento.delete', $plan->id) }}" method="POST" onsubmit="return confirm('¿Realmente desea eliminar el registro?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm eliminar"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>   
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
