@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @include('includes.message')
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-9">
                        <h4>Personal</h4>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route('personal.create') }}" class="btn btn-primary">Registrar personal</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table dataTable table-hover table-striped">
                            <thead>
                                <tr class="table-danger">
                                    <th>Código</th>
                                    <th>CI</th>
                                    <th>Nombre y apellido</th>
                                    <th>Numero de contacto</th>
                                    <th>Correo electrónico</th>
                                    <th>Area</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (is_null($personal))
                                <tr>
                                    <td colspan="3" class="text-center">No hay personal registrado</td>
                                </tr>
                                @else
                                    @foreach ($personal as $persona)
                                        <tr>
                                            <td>{{ $persona->id }}</td>
                                            <td>{{ $persona->ci }}</td>
                                            <td>{{ $persona->nombre." ".$persona->apellido }}</td>
                                            <td>{{ $persona->nro_telefono }}</td>
                                            <td>{{ $persona->correo_electronico }}</td>
                                            <td>{{ $persona->area }}</td>
                                            <td>
                                                <div class="acciones">
                                                <a href="{{ route('personal.edit', ['id' => $persona->id]) }}" class="btn btn-primary btn-sm editar"><i class="bi bi-pencil"></i></a>
                                                <form action="{{ route('personal.delete', $persona->id) }}" method="POST" onsubmit="return confirm('¿Realmente desea eliminar el registro?')">
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
