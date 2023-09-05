@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @include('includes.message')
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-9">
                        <h4>Maquinaria</h4>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route('maquinaria.create') }}" class="btn btn-primary">Registrar Máquina</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table dataTable table-hover table-striped">
                            <thead>
                                <tr class="table-danger">
                                    <th>Id</th>
                                    <th>Serial Institución</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Capacidad</th>
                                    <th>Condicion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (is_null($maquinas))
                                <tr>
                                    <td colspan="3" class="text-center">No hay máquinas registradas</td>
                                </tr>
                                @else
                                    @foreach ($maquinas as $maquina)
                                        <tr>
                                            <td>{{ $maquina->id }}</td>
                                            <td>{{ $maquina->serial_institucion }}</td>
                                            <td>{{ $maquina->nombre }}</td>
                                            <td>{{ $maquina->marca }}</td>
                                            <td>{{ $maquina->modelo }}</td>
                                            <td>{{ $maquina->capacidad }} {{$maquina->capacidad_medida}}</td>
                                            <td>{{ $maquina->condicion }}</td>
                                            <td>
                                                <div class="acciones">
                                                <a href="{{route('maquinaria.show', $maquina->id)}}" title="Ver más" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                                <a href="{{ route('maquinaria.edit', ['id' => $maquina->id]) }}" class="btn btn-primary btn-sm editar"><i class="bi bi-pencil"></i></a>
                                                <form action="{{route('maquinaria.delete', $maquina->id)}}" class="eliminar" method="POST" onsubmit="return confirm('¿Realmente desea eliminar el registro?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"> <i class="bi bi-trash"></i> </button>
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
