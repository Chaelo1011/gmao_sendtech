@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-9">
                        <h4>Editar repuesto</h4>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route('repuestos.index') }}" class="btn btn-primary">Regresar</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('repuestos.update', $repuesto->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="nombre" class="col-md-3 col-form-label text-right">Nombre</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ $repuesto->nombre }}" placeholder="Nombre" required autocapitalize="on">
                                
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dimensiones" class="col-md-3 col-form-label text-right">Dimensiones</label>

                            <div class="col-md-5">
                                <input type="text" class="form-control @error('dimensiones') is-invalid @enderror" name="dimensiones" id="dimensiones" value="{{ $repuesto->dimensiones }}" placeholder="Dimensiones del repuesto" pattern="[0-9.,]+" autocomplete="off">
                                
                                @error('dimensiones')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <select name="dimensiones_medida" id="dimensiones_medida" class="form-select @error('dimensiones_medida') is-invalid @enderror">
                                    <option value="">Medida</option>

                                    <?php $dimensiones = ['mm', 'cm', 'Inch']; ?>
                                    
                                    @for($i=0; $i < count($dimensiones); $i++ )
                                        <option value="{{$dimensiones[$i]}}" @if($dimensiones[$i]==$repuesto->dimensiones_medida) selected @endif >{{$dimensiones[$i]}}</option>
                                    @endfor
                                </select>
                                
                                @error('dimensiones_medida')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="capacidad" class="col-md-3 col-form-label text-right">Capacidad</label>

                            <div class="col-md-5">
                                <input type="text" class="form-control @error('capacidad') is-invalid @enderror" name="capacidad" id="capacidad" value="{{ $repuesto->capacidad }}" placeholder="Capacidad de la máquina" pattern="[0-9.,]+" autocomplete="off">
                                
                                @error('capacidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <select name="capacidad_medida" id="capacidad_medida" class="form-select @error('capacidad_medida') is-invalid @enderror">
                                    <option value="">Medida</option>
                                    
                                    <?php $capacidad = ['Kg', 'Cc', 'Inch', 'Watts', 'Lb', 'Ton']; ?>
                                    
                                    @for($i=0; $i < count($capacidad); $i++ )
                                        <option value="{{$capacidad[$i]}}" @if($capacidad[$i]==$repuesto->capacidad_medida) selected @endif >{{$capacidad[$i]}}</option>
                                    @endfor
                                </select>
                                
                                @error('capacidad_medida')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="costo_estimado" class="col-md-3 col-form-label text-right">Costo estimado en Bs</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('costo_estimado') is-invalid @enderror" name="costo_estimado" id="costo_estimado" value="{{ $repuesto->costo_estimado }}" placeholder="Costo estimado del repuesto" pattern="[0-9.,]+" autocomplete="off">
                                
                                @error('costo_estimado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <button type="reset" class="btn btn-danger">Borrar campos</button>
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection