@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-9">
                        <h4>Editar herramienta</h4>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route('herramientas.index') }}" class="btn btn-sm btn-secondary">Regresar</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('herramientas.update', $herramienta->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="nombre" class="col-md-3 col-form-label text-right">Nombre</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ $herramienta->nombre }}" placeholder="Nombre de la herramienta" required autocapitalize="on">
                                
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
                                <input type="text" class="form-control @error('dimensiones') is-invalid @enderror" name="dimensiones" id="dimensiones" value="{{ $herramienta->dimensiones }}" placeholder="Dimensiones de la herramienta" pattern="[0-9.,]+" autocomplete="off">
                                
                                @error('dimensiones')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <select name="dimensiones_medida" id="dimensiones_medida" class="form-control @error('dimensiones_medida') is-invalid @enderror">
                                    <option value="">Medida</option>

                                    <?php $dimensiones = ['cm','mm','Inch','Watts'] ?>

                                    @for($i=0; $i < count($dimensiones); $i++)
                                        <option value="{{$dimensiones[$i]}}" @if($dimensiones[$i]==$herramienta->dimensiones_medida) selected @endif>{{$dimensiones[$i]}}</option>
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

                                <input type="text" class="form-control @error('capacidad') is-invalid @enderror" name="capacidad" id="capacidad" value="{{ $herramienta->capacidad }}" placeholder="Capacidad de la herramienta" pattern="[0-9.,]+" autocomplete="off">
                                
                                @error('capacidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <select name="capacidad_medida" id="capacidad_medida" class="form-control @error('capacidad_medida') is-invalid @enderror">
                                    <option value="">Medida</option>

                                    <?php $capacidad = ['Kg','Cc','Inch','Watts'] ?>

                                    @for($i=0; $i < count($capacidad); $i++)
                                        <option value="{{$capacidad[$i]}}" @if($capacidad[$i]==$herramienta->capacidad_medida) selected @endif>{{$capacidad[$i]}}</option>
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
                            <div class="col-md-6 offset-md-3">
                                <button type="reset" class="btn btn-danger">Borrar campos</button>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
