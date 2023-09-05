@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @include('includes.message')
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-8">
                        <h4>Compras de Repuestos</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{ route('compra_repuestos.create') }}" class="btn btn-primary">Registrar nueva compra</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table dataTable table-hover table-striped">
                            <thead>
                                <tr class="table-danger">
                                    <th>Codigo</th>
                                    <th>Fecha de compra</th>
                                    <th>Repuestos</th>
                                    <th>Costo total</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
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
                                                        $str = $str.''.$repuesto->nombre.' '.$repuesto->capacidad.' '.$repuesto->capacidad_medida.", ";
                                                    }
                                                } echo trim($str, ', ');
                                            ?></td>
                                            <td>{{ $compra->costo_total.' Bs' }}</td>
                                            <td>{{ $compra->estatus }}</td>
                                            <td>
                                                <div class="acciones">
                                                    <a href="{{route('compra_repuestos.show', ['id' => $compra->id])}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="bi bi-eye"></i></a>
                                                    <a href="{{ route('compra_repuestos.edit', ['id' => $compra->id]) }}" class="btn btn-primary btn-sm editar"><i class="bi bi-pencil"></i></a>
                                                    <form action="{{ route('compra_repuestos.delete', $compra->id) }}" method="POST" onsubmit="return confirm('¿Realmente desea eliminar el registro?')">
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
