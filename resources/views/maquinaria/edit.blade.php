@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-9">
                        <h4>Editar máquina</h4>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route('maquinaria.index') }}" class="btn btn-primary">Regresar</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('maquinaria.update', $maquina->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="id_taller" class="col-md-3 col-form-label text-right">Taller</label>

                            <div class="col-md-7">
                                <select name="id_taller" id="id_taller" class="form-control @error('id_taller') is-invalid @enderror" required>
                                    <option value="">Seleccione un taller</option>
                                    
                                    @foreach($talleres as $taller)
                                        <option value="{{$taller->id}}" @if($taller->id == $maquina->id_taller) selected @endif>{{$taller->nombre." - ".$taller->area}}</option>
                                    @endforeach
                                </select>
                                
                                @error('id_taller')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="serial_institucion" class="col-md-3 col-form-label text-right">Serial Institución</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('serial_institucion') is-invalid @enderror" name="serial_institucion" id="serial_institucion" value="{{ $maquina->serial_institucion }}" placeholder="Serial de la maquina asignado por la institución" required autocomplete="off" autocapitalize="characters">
                                
                                @error('serial_institucion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="serial_maquina" class="col-md-3 col-form-label text-right">Serial máquina</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('serial_maquina') is-invalid @enderror" name="serial_maquina" id="serial_maquina" value="{{ $maquina->serial_maquina }}" placeholder="Serial de la máquina" required autocomplete="off" autocapitalize="characters">
                                
                                @error('serial_maquina')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-3 col-form-label text-right">Nombre</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ $maquina->nombre }}" placeholder="Nombre de la máquina" required autocapitalize="on">
                                
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marca" class="col-md-3 col-form-label text-right">Marca</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('marca') is-invalid @enderror" name="marca" id="nombre" value="{{ $maquina->marca }}" placeholder="Marca" required autocapitalize="on">
                                
                                @error('marca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="modelo" class="col-md-3 col-form-label text-right">Modelo</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" id="nombre" value="{{ $maquina->modelo }}" placeholder="Modelo" required autocomplete="off" autocapitalize="characters">
                                
                                @error('modelo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="capacidad" class="col-md-3 col-form-label text-right">Capacidad</label>

                            <div class="col-md-5">
                                <input type="text" class="form-control @error('capacidad') is-invalid @enderror" name="capacidad" id="capacidad" value="{{ $maquina->capacidad }}" placeholder="Capacidad de la máquina" pattern="[0-9.,]+" autocomplete="off">
                                
                                @error('capacidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <select name="capacidad_medida" id="capacidad_medida" class="form-select @error('capacidad_medida') is-invalid @enderror">
                                    <option value="">Medida</option>

                                    <?php $medidas = ['Kg', 'Cc', 'Inch', 'Watts', 'Ton'] ?>

                                    @for($i=0; $i<count($medidas); $i++)
                                        <option value="{{$medidas[$i]}}" @if($medidas[$i]==$maquina->capacidad_medida) selected @endif>{{$medidas[$i]}}</option>
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
                            <label for="condicion" class="col-md-3 col-form-label text-right">Condición</label>

                            <div class="col-md-7">
                                <select name="condicion" id="condicion" class="form-select @error('condicion') is-invalid @enderror" required>
                                    <option value="">Condicion</option>

                                    <?php $condicion = ['Operativa', 'Fallando', 'Fuera de servicio'] ?>

                                    @for($i=0; $i<count($condicion); $i++)
                                        <option value="{{$condicion[$i]}}" @if($condicion[$i]==$maquina->condicion) selected @endif>{{$condicion[$i]}}</option>
                                    @endfor
                                </select>
                                @error('condicion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="observacion" class="col-md-3 col-form-label text-right">Observación</label>

                            <div class="col-md-7">
                                <textarea class="form-control  @error('observacion') is-invalid @enderror" name="observacion" id="observacion" cols="30" rows="5" autocapitalize="on">@if($maquina->observacion){{$maquina->observacion}}@endif
                                </textarea>
                                
                                @error('observacion')
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
