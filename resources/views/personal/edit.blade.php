@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-9">
                        <h4>Editar persona</h4>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route('personal.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('personal.update', $persona->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="ci" class="col-md-3 col-form-label text-right">Cédula de Identidad</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('ci') is-invalid @enderror" name="ci" id="ci" value="{{$persona->ci }}" placeholder="Cédula de identidad de la persona" required autocomplete="off" pattern="[0-9]+">
                                
                                @error('ci')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-3 col-form-label text-right">Nombre</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ $persona->nombre }}" placeholder="Nombre" required autocapitalize="on">
                                
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-3 col-form-label text-right">Apellido</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" id="apellido" value="{{ $persona->apellido }}" placeholder="Apellido" required autocapitalize="on">
                                
                                @error('apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nro_telefono" class="col-md-3 col-form-label text-right">Número de teléfono</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('nro_telefono') is-invalid @enderror" name="nro_telefono" id="nro_telefono" value="{{ $persona->nro_telefono }}" placeholder="Número de teléfono" required autocomplete="off" pattern="[0-9]{10}">
                                
                                @error('nro_telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-right">Correo Electrónico</label>

                            <div class="col-md-7">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $persona->correo_electronico }}" placeholder="Correo electrónico" autocomplete="off">
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area" class="col-md-3 col-form-label text-right">Área</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('area') is-invalid @enderror" name="area" id="area" value="{{ $persona->area }}" placeholder="Área de trabajo" required autocomplete="off">
                                
                                @error('area')
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