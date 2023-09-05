@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-9">
                        <h4>Registrar plan de mantenimiento</h4>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route('plan_mantenimiento.index') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> &nbsp;Regresar</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('plan_mantenimiento.store') }}" id="form-create-plan" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="id_maquina" class="col-md-3 col-form-label text-right">Máquina</label>

                            <div class="col-md-7">
                                <select name="id_maquina" id="id_maquina" class="form-select @error('id_maquina') is-invalid @enderror" required>
                                    <option value="">Seleccione una máquina</option>
                                    
                                    @foreach($maquinaria as $maquina)
                                        <option value="{{$maquina->id}}">{{$maquina->id." - ".$maquina->nombre." ".$maquina->marca." ".$maquina->modelo}}</option>
                                    @endforeach
                                </select>
                                
                                @error('id_maquina')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="personal-container">
                            <!-- 0 -->
                            <div class="form-group row personal-row">
                                <label for="id-personal0" class="col-md-3 col-form-label text-right">Personal</label>

                                <div class="col-md-7">
                                    <select name="id-personal0" id="id-personal0" class="form-select @error('id-personal0') is-invalid @enderror personal-select" required>
                                        <option value="">Seleccione personal calificado</option>
                                        
                                        @foreach($personal as $persona)
                                            <option value="{{$persona->id}}">{{$persona->ci." - ".$persona->nombre." ".$persona->apellido." - ".$persona->area}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-personal0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" id="add-personal-row" class="btn btn-primary"><i class="bi bi-plus"></i></button>
                                </div>
                            </div>

                            <!-- 1 -->
                            <div class="form-group row personal-row" id="personal-row1" style="display: @error('id-personal1') block @enderror none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-personal1" id="id-personal1" class="form-select @error('id-personal1') is-invalid @enderror personal-select" >
                                        <option value="">Seleccione personal calificado</option>
                                        
                                        @foreach($personal as $persona)
                                            <option value="{{$persona->id}}">{{$persona->ci." - ".$persona->nombre." ".$persona->apellido." - ".$persona->area}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-personal1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-personal-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="form-group row personal-row" id="personal-row2" style="display: @error('id-personal2') block @enderror none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-personal2" id="id-personal2" class="form-select @error('id-personal2') is-invalid @enderror personal-select" >
                                        <option value="">Seleccione personal calificado</option>
                                        
                                        @foreach($personal as $persona)
                                            <option value="{{$persona->id}}">{{$persona->ci." - ".$persona->nombre." ".$persona->apellido." - ".$persona->area}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-personal2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-personal-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 3 -->
                            <div class="form-group row personal-row" id="personal-row3" style="display: @error('id-personal3') block @enderror none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-personal3" id="id-personal3" class="form-select @error('id-personal3') is-invalid @enderror personal-select" >
                                        <option value="">Seleccione personal calificado</option>
                                        
                                        @foreach($personal as $persona)
                                            <option value="{{$persona->id}}">{{$persona->ci." - ".$persona->nombre." ".$persona->apellido." - ".$persona->area}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-personal3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-personal-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 4 -->
                            <div class="form-group row personal-row" id="personal-row4" style="display: @error('id-personal4') block @enderror none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-personal4" id="id-personal4" class="form-select @error('id-personal4') is-invalid @enderror personal-select" >
                                        <option value="">Seleccione personal calificado</option>
                                        
                                        @foreach($personal as $persona)
                                            <option value="{{$persona->id}}">{{$persona->ci." - ".$persona->nombre." ".$persona->apellido." - ".$persona->area}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-personal4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-personal-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 5 -->
                            <div class="form-group row personal-row" id="personal-row5" style="display: @error('id-personal5') block @enderror none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-personal5" id="id-personal5" class="form-select @error('id-personal5') is-invalid @enderror personal-select" >
                                        <option value="">Seleccione personal calificado</option>
                                        
                                        @foreach($personal as $persona)
                                            <option value="{{$persona->id}}">{{$persona->ci." - ".$persona->nombre." ".$persona->apellido." - ".$persona->area}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-personal5')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-personal-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 6 -->
                            <div class="form-group row personal-row" id="personal-row6" style="display: @error('id-personal6') block @enderror none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-personal6" id="id-personal6" class="form-select @error('id-personal6') is-invalid @enderror personal-select"  >
                                        <option value="">Seleccione personal calificado</option>
                                        
                                        @foreach($personal as $persona)
                                            <option value="{{$persona->id}}">{{$persona->ci." - ".$persona->nombre." ".$persona->apellido." - ".$persona->area}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-personal6')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-personal-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 7 -->
                            <div class="form-group row personal-row" id="personal-row7" style="display: @error('id-personal7') block @enderror none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-personal7" id="id-personal7" class="form-select @error('id-personal7') is-invalid @enderror personal-select">
                                        <option value="">Seleccione personal calificado</option>
                                        
                                        @foreach($personal as $persona)
                                            <option value="{{$persona->id}}">{{$persona->ci." - ".$persona->nombre." ".$persona->apellido." - ".$persona->area}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-personal7')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-personal-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 8 -->
                            <div class="form-group row personal-row" id="personal-row8" style="display: @error('id-personal8') block @enderror none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-personal8" id="id-personal8" class="form-select @error('id-personal8') is-invalid @enderror personal-select">
                                        <option value="">Seleccione personal calificado</option>
                                        
                                        @foreach($personal as $persona)
                                            <option value="{{$persona->id}}">{{$persona->ci." - ".$persona->nombre." ".$persona->apellido." - ".$persona->area}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-personal8')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-personal-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 9 -->
                            <div class="form-group row personal-row" id="personal-row9" style="display: @error('id-personal9') block @enderror none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-personal9" id="id-personal9" class="form-select @error('id-personal9') is-invalid @enderror personal-select"  >
                                        <option value="">Seleccione personal calificado</option>
                                        
                                        @foreach($personal as $persona)
                                            <option value="{{$persona->id}}">{{$persona->ci." - ".$persona->nombre." ".$persona->apellido." - ".$persona->area}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-personal9')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-personal-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div class="herramientas-container">
                            <!-- 0 -->
                            <div class="form-group row herramientas-row">
                                <label for="id-herramientas0" class="col-md-3 col-form-label text-right">Herramientas</label>

                                <div class="col-md-7">
                                    <select name="id-herramientas0" id="id-herramientas0" class="form-select @error('id-herramientas0') is-invalid @enderror herramientas-select" required>
                                        <option value="">Seleccione una herramienta</option>
                                        
                                        @foreach($herramientas as $herramienta)
                                            <option value="{{$herramienta->id}}">{{$herramienta->id." - ".$herramienta->nombre." ".$herramienta->dimensiones." ".$herramienta->dimensiones_medida." ".$herramienta->capacidad." ".$herramienta->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-herramientas0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" id="add-herramientas-row" class="btn btn-primary"><i class="bi bi-plus"></i></button>
                                </div>
                            </div>

                            <!-- 1 -->
                            <div class="form-group row herramientas-row" id="herramientas-row1" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-herramientas1" id="id-herramientas1" class="form-select @error('id-herramientas1') is-invalid @enderror herramientas-select"  >
                                        <option value="">Seleccione una herramienta</option>
                                        
                                        @foreach($herramientas as $herramienta)
                                            <option value="{{$herramienta->id}}">{{$herramienta->id." - ".$herramienta->nombre." ".$herramienta->dimensiones." ".$herramienta->dimensiones_medida." ".$herramienta->capacidad." ".$herramienta->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-herramientas1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-herramientas-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="form-group row herramientas-row" id="herramientas-row2" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-herramientas2" id="id-herramientas2" class="form-select @error('id-herramientas2') is-invalid @enderror herramientas-select"  >
                                        <option value="">Seleccione una herramienta</option>
                                        
                                        @foreach($herramientas as $herramienta)
                                            <option value="{{$herramienta->id}}">{{$herramienta->id." - ".$herramienta->nombre." ".$herramienta->dimensiones." ".$herramienta->dimensiones_medida." ".$herramienta->capacidad." ".$herramienta->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-herramientas2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-herramientas-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 3 -->
                            <div class="form-group row herramientas-row" id="herramientas-row3" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-herramientas3" id="id-herramientas3" class="form-select @error('id-herramientas3') is-invalid @enderror herramientas-select"  >
                                        <option value="">Seleccione una herramienta</option>
                                        
                                        @foreach($herramientas as $herramienta)
                                            <option value="{{$herramienta->id}}">{{$herramienta->id." - ".$herramienta->nombre." ".$herramienta->dimensiones." ".$herramienta->dimensiones_medida." ".$herramienta->capacidad." ".$herramienta->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-herramientas3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-herramientas-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 4 -->
                            <div class="form-group row herramientas-row" id="herramientas-row4" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-herramientas4" id="id-herramientas4" class="form-select @error('id-herramientas4') is-invalid @enderror herramientas-select"  >
                                        <option value="">Seleccione una herramienta</option>
                                        
                                        @foreach($herramientas as $herramienta)
                                            <option value="{{$herramienta->id}}">{{$herramienta->id." - ".$herramienta->nombre." ".$herramienta->dimensiones." ".$herramienta->dimensiones_medida." ".$herramienta->capacidad." ".$herramienta->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-herramientas4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-herramientas-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 5 -->
                            <div class="form-group row herramientas-row" id="herramientas-row5" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-herramientas5" id="id-herramientas5" class="form-select @error('id-herramientas5') is-invalid @enderror herramientas-select"  >
                                        <option value="">Seleccione una herramienta</option>
                                        
                                        @foreach($herramientas as $herramienta)
                                            <option value="{{$herramienta->id}}">{{$herramienta->id." - ".$herramienta->nombre." ".$herramienta->dimensiones." ".$herramienta->dimensiones_medida." ".$herramienta->capacidad." ".$herramienta->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-herramientas5')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-herramientas-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 6 -->
                            <div class="form-group row herramientas-row" id="herramientas-row6" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-herramientas6" id="id-herramientas6" class="form-select @error('id-herramientas6') is-invalid @enderror herramientas-select"  >
                                        <option value="">Seleccione una herramienta</option>
                                        
                                        @foreach($herramientas as $herramienta)
                                            <option value="{{$herramienta->id}}">{{$herramienta->id." - ".$herramienta->nombre." ".$herramienta->dimensiones." ".$herramienta->dimensiones_medida." ".$herramienta->capacidad." ".$herramienta->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-herramientas6')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-herramientas-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 7 -->
                            <div class="form-group row herramientas-row" id="herramientas-row7" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-herramientas7" id="id-herramientas7" class="form-select @error('id-herramientas7') is-invalid @enderror herramientas-select"  >
                                        <option value="">Seleccione una herramienta</option>
                                        
                                        @foreach($herramientas as $herramienta)
                                            <option value="{{$herramienta->id}}">{{$herramienta->id." - ".$herramienta->nombre." ".$herramienta->dimensiones." ".$herramienta->dimensiones_medida." ".$herramienta->capacidad." ".$herramienta->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-herramientas7')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-herramientas-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 8 -->
                            <div class="form-group row herramientas-row" id="herramientas-row8" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-herramientas8" id="id-herramientas8" class="form-select @error('id-herramientas8') is-invalid @enderror herramientas-select"  >
                                        <option value="">Seleccione una herramienta</option>
                                        
                                        @foreach($herramientas as $herramienta)
                                            <option value="{{$herramienta->id}}">{{$herramienta->id." - ".$herramienta->nombre." ".$herramienta->dimensiones." ".$herramienta->dimensiones_medida." ".$herramienta->capacidad." ".$herramienta->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-herramientas8')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-herramientas-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 9 -->
                            <div class="form-group row herramientas-row" id="herramientas-row9" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-herramientas9" id="id-herramientas9" class="form-select @error('id-herramientas9') is-invalid @enderror herramientas-select"  >
                                        <option value="">Seleccione una herramienta</option>
                                        
                                        @foreach($herramientas as $herramienta)
                                            <option value="{{$herramienta->id}}">{{$herramienta->id." - ".$herramienta->nombre." ".$herramienta->dimensiones." ".$herramienta->dimensiones_medida." ".$herramienta->capacidad." ".$herramienta->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-herramientas9')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-herramientas-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            
                        </div>

                        <hr>

                        <div class="repuestos-container">
                            <!-- 0 -->
                            <div class="form-group row repuestos-row">
                                <label for="id-repuestos0" class="col-md-3 col-form-label text-right">Repuestos</label>

                                <div class="col-md-7">
                                    <select name="id-repuestos0" id="id-repuestos0" class="form-select @error('id-repuestos0') is-invalid @enderror repuestos-select">
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id}}">{{$repuesto->id." - ".$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-repuestos0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" id="add-repuestos-row" class="btn btn-primary"><i class="bi bi-plus"></i></button>
                                </div>
                            </div>
                            <!-- 1 -->
                            <div class="form-group row repuestos-row" id="repuestos-row1" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-repuestos1" id="id-repuestos1" class="form-select @error('id-repuestos1') is-invalid @enderror repuestos-select"  >
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id}}">{{$repuesto->id." - ".$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-repuestos1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-repuestos-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="form-group row repuestos-row" id="repuestos-row2" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-repuestos2" id="id-repuestos2" class="form-select @error('id-repuestos2') is-invalid @enderror repuestos-select"  >
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id}}">{{$repuesto->id." - ".$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-repuestos2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-repuestos-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 3 -->
                            <div class="form-group row repuestos-row" id="repuestos-row3" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-repuestos3" id="id-repuestos3" class="form-select @error('id-repuestos3') is-invalid @enderror repuestos-select"  >
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id}}">{{$repuesto->id." - ".$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-repuestos3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-repuestos-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 4 -->
                            <div class="form-group row repuestos-row" id="repuestos-row4" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-repuestos4" id="id-repuestos4" class="form-select @error('id-repuestos4') is-invalid @enderror repuestos-select"  >
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id}}">{{$repuesto->id." - ".$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-repuestos4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-repuestos-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 5 -->
                            <div class="form-group row repuestos-row" id="repuestos-row5" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-repuestos5" id="id-repuestos5" class="form-select @error('id-repuestos5') is-invalid @enderror repuestos-select"  >
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id}}">{{$repuesto->id." - ".$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-repuestos5')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-repuestos-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 6 -->
                            <div class="form-group row repuestos-row" id="repuestos-row6" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-repuestos6" id="id-repuestos6" class="form-select @error('id-repuestos6') is-invalid @enderror repuestos-select"  >
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id}}">{{$repuesto->id." - ".$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-repuestos6')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-repuestos-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 7 -->
                            <div class="form-group row repuestos-row" id="repuestos-row7" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-repuestos7" id="id-repuestos7" class="form-select @error('id-repuestos7') is-invalid @enderror repuestos-select"  >
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id}}">{{$repuesto->id." - ".$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-repuestos7')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-repuestos-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 8 -->
                            <div class="form-group row repuestos-row" id="repuestos-row8" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-repuestos8" id="id-repuestos8" class="form-select @error('id-repuestos8') is-invalid @enderror repuestos-select"  >
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id}}">{{$repuesto->id." - ".$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-repuestos8')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-repuestos-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <!-- 9 -->
                            <div class="form-group row repuestos-row" id="repuestos-row9" style="display: none">

                                <div class="col-md-7 offset-md-3">
                                    <select name="id-repuestos9" id="id-repuestos9" class="form-select @error('id-repuestos9') is-invalid @enderror repuestos-select"  >
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id}}">{{$repuesto->id." - ".$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id-repuestos9')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger drop-repuestos-row"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 offset-md-3">
                                    <span class="form-text"><i class="bi bi-info-circle"></i> Si los repuestos a registrar no están actualmente en stock, por favor registrarlos en compra de repuestos para un mejor control.</span>
                                </div>
                            </div> 
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="fechaPlan" class="col-md-3 col-form-label text-right">Fecha del plan</label>

                            <div class="col-md-7">
                                <input type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" id="fechaPlan" value="{{ old('fecha') }}" required autocomplete="off">
                                
                                @error('fecha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo_mantenimiento" class="col-md-3 col-form-label text-right">Tipo de mantenimiento</label>

                            <div class="col-md-7">
                                <select name="tipo_mantenimiento" id="tipo_mantenimiento" class="form-select @error('tipo_mantenimiento') is-invalid @enderror" required>
                                    <option value="">Tipo de mantenimiento</option>
                                    <option value="Preventivo">Preventivo</option>
                                    <option value="Correctivo">Correctivo</option>
                                    <option value="Predictivo">Predictivo</option>
                                </select>
                                
                                @error('tipo_mantenimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="criticidad" class="col-md-3 col-form-label text-right">Prioridad</label>

                            <div class="col-md-7">
                                <select name="criticidad" id="criticidad" class="form-select @error('criticidad') is-invalid @enderror" required>
                                    <option value="">Prioridad del mantenimiento</option>
                                    <option value="Baja">Baja</option>
                                    <option value="Media">Media</option>
                                    <option value="Alta">Alta</option>
                                </select>
                                
                                @error('criticidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estatus" class="col-md-3 col-form-label text-right">Estatus</label>

                            <div class="col-md-7">
                                <select name="estatus" id="estatus" class="form-select @error('estatus') is-invalid @enderror" required>
                                    <option value="">Estatus del plan</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Completado">Completado</option>
                                </select>
                                
                                @error('estatus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-3 col-form-label text-right">Descripción</label>

                            <div class="col-md-7">
                                <textarea class="form-control  @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" cols="30" rows="5" autocapitalize="on">{{old('descripcion')}}</textarea>
                                
                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-5 mb-4">
                            <div class="col-md-7 offset-md-3">
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