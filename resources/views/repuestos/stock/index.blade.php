@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @include('includes.message')
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-9">
                        <h4>Repuestos</h4>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route('repuestos.create') }}" class="btn btn-primary">Registrar repuesto</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table dataTable table-hover table-striped">
                            <thead>
                                <tr class="table-danger">
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Dimensiones</th>
                                    <th>Capacidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (is_null($repuestos))
                                <tr>
                                    <td colspan="3" class="text-center">No hay repuestos registrados</td>
                                </tr>
                                @else
                                    @foreach ($repuestos as $repuesto)
                                        <tr>
                                            <td>{{ $repuesto->id }}</td>
                                            <td>{{ $repuesto->nombre }}</td>
                                            <td>{{ $repuesto->dimensiones }} {{ $repuesto->dimensiones_medida }}</td>
                                            <td>{{ $repuesto->capacidad." ".$repuesto->capacidad_medida}}</td>
                                            <td>
                                                <div class="acciones">
                                                <a href="{{ route('repuestos.edit', $repuesto->id) }}" class="btn btn-primary btn-sm editar"><i class="bi bi-pencil"></i></a>
                                                <form action="{{route('repuestos.delete', $repuesto->id) }}" class="eliminar" method="POST" onsubmit="return confirm('¿Realmente desea eliminar el registro?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
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
