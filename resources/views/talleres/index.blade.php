@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @include('includes.message')
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-9">
                        <h4>Talleres</h4>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route('talleres.create') }}" class="btn btn-primary">Registrar taller</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped dataTable">
                            <thead>
                                <tr class="table-danger">
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Área</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (is_null($talleres))
                                <tr>
                                    <td colspan="3" class="text-center">No hay talleres registrados</td>
                                </tr>
                                @else
                                    @foreach ($talleres as $taller)
                                        <tr>
                                            <td>{{ $taller->id }}</td>
                                            <td>{{ $taller->nombre }}</td>
                                            <td>{{ $taller->area }}</td>
                                            <td class="acciones">
                                                <a href="{{ route('talleres.edit', ['id' => $taller->id]) }}" class="btn btn-primary btn-sm editar"><i class="bi bi-pencil"></i></a>
                                                <form action="{{ route('talleres.delete', $taller->id) }}" class="eliminar" method="POST" onsubmit="return confirm('¿Realmente desea eliminar el registro?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                </form>
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
