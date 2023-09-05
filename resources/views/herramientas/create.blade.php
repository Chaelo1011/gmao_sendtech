@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-9">
                        <h4>Registrar herramienta</h4>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route('herramientas.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('herramientas.store') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-3 col-form-label text-right">Nombre</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ old('nombre') }}" placeholder="Nombre de la herramienta" required autocapitalize="on">
                                
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
                                <input type="text" class="form-control @error('dimensiones') is-invalid @enderror" name="dimensiones" id="dimensiones" value="{{ old('dimensiones') }}" placeholder="Dimensiones de la herramienta" pattern="[0-9.,]+" autocomplete="off">
                                
                                @error('dimensiones')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <select name="dimensiones_medida" id="dimensiones_medida" class="form-select @error('dimensiones_medida') is-invalid @enderror">
                                    <option value="">Medida</option>
                                    <option value="cm">cm</option>
                                    <option value="mm">mm</option>
                                    <option value="Inch">Inch</option>
                                    <option value="Watts">Watts</option>
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
                                <input type="text" class="form-control @error('capacidad') is-invalid @enderror" name="capacidad" id="capacidad" value="{{ old('capacidad') }}" placeholder="Capacidad de la herramienta" pattern="[0-9.,]+" autocomplete="off">
                                
                                @error('capacidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <select name="capacidad_medida" id="capacidad_medida" class="form-select @error('capacidad_medida') is-invalid @enderror">
                                    <option value="">Medida</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Cc">Cc</option>
                                    <option value="Inch">Inch</option>
                                    <option value="Watts">Watts</option>
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
