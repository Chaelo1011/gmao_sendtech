@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header row m-0">
                    <div class="col-md-9">
                        <h4>Editar compra de repuestos</h4>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="#" onclick="history.back();" class="btn btn-primary">Regresar</a>
                    </div>
                </div>

                <div class="card-body">
                    <form id="compra_repuestos_form" action="{{ route('compra_repuestos.update', $compra->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="id_plan" class="col-md-3 col-form-label text-right">Plan de Mantenimiento</label>

                            <div class="col-md-7">
                                <select name="id_plan" id="id_plan" class="form-select @error('id_plan') is-invalid @enderror" required>
                                    <option value="">Seleccione un plan de mantenimiento</option>
                                    
                                    @foreach($planes as $plan)
                                        <option value="{{$plan->id}}" 
                                            @if($plan->id==$compra->id_plan) selected @endif
                                            >
                                            {{$plan->id." - ".$plan->fecha." - ".$plan->nombre." ".$plan->marca." ".$plan->modelo}}
                                        </option>
                                    @endforeach
                                </select>
                                
                                @error('id_plan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="repuestos_container">
                            <!-- 0 -->
                            <div class="form-group row repuestoRow">
                                <label for="id_repuesto0" class="col-md-3 col-form-label text-right">Repuestos</label>

                                <div class="col-md-7">
                                    <select name="id_repuesto0" id="id_repuesto0" class="form-select @error('id_repuesto0') is-invalid @enderror repuestoSelect" required>
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        <?php $find = 0 ?>
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id.'-'.$repuesto->costo_estimado}}" 
                                             @for($i=0; $i < count($repuestos_selected); $i++)
                                                @if(($repuesto->id == $repuestos_selected[$i]) && $find==0)
                                                    selected
                                                    <?php $find = 1; $repuestos_selected[$i]=false;?>
                                                @endif
                                             @endfor >
                                             {{$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}
                                             </option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id_repuesto0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" id="addRepuestoRow" class="btn btn-primary"><i class="bi bi-plus"></i></button>
                                </div>

                                <!-- <input type="hidden" id="costo_estimado0" name="costo_estimado" value=""> -->

                            </div>

                            <!-- 1 -->

                            <div class="form-group row repuestoRow" id="repuestoRow1" style="display: none">
                                
                                <div class="col-md-7 offset-md-3">
                                    <select name="id_repuesto1" id="id_repuesto1" class="form-select @error('id_repuesto1') is-invalid @enderror repuestoSelect">
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        <?php $find = 0 ?>
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id.'-'.$repuesto->costo_estimado}}" 
                                             @for($i=0; $i < count($repuestos_selected); $i++)
                                                @if(($repuesto->id == $repuestos_selected[$i]) && $find==0)
                                                    selected
                                                    <?php $find = 1; $repuestos_selected[$i]=false;?>
                                                @endif
                                             @endfor >
                                             {{$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}
                                             </option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id_repuesto1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" data-rowNumber="1" class="btn btn-danger dropRepuestoRow"><i class="bi bi-trash"></i></button>
                                </div>

                            </div>

                            <!-- 2 -->

                            <div class="form-group row repuestoRow" id="repuestoRow2" style="display: none">
                                
                                <div class="col-md-7 offset-md-3">
                                    <select name="id_repuesto2" id="id_repuesto2" class="form-select @error('id_repuesto2') is-invalid @enderror repuestoSelect">
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        <?php $find = 0 ?>
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id.'-'.$repuesto->costo_estimado}}" 
                                             @for($i=0; $i < count($repuestos_selected); $i++)
                                                @if(($repuesto->id == $repuestos_selected[$i]) && $find==0)
                                                    selected
                                                    <?php $find = 1; $repuestos_selected[$i]=false;?>
                                                @endif
                                             @endfor >
                                             {{$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}
                                             </option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id_repuesto2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" data-rowNumber="2" class="btn btn-danger dropRepuestoRow"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>

                            <!-- 3 -->

                            <div class="form-group row repuestoRow" id="repuestoRow3" style="display: none">
                                
                                <div class="col-md-7 offset-md-3">
                                    <select name="id_repuesto3" id="id_repuesto3" class="form-select @error('id_repuesto3') is-invalid @enderror repuestoSelect">
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        <?php $find = 0 ?>
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id.'-'.$repuesto->costo_estimado}}" 
                                             @for($i=0; $i < count($repuestos_selected); $i++)
                                                @if(($repuesto->id == $repuestos_selected[$i]) && $find==0)
                                                    selected
                                                    <?php $find = 1; $repuestos_selected[$i]=false;?>
                                                @endif
                                             @endfor >
                                             {{$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}
                                             </option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id_repuesto3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" data-rowNumber="3" class="btn btn-danger dropRepuestoRow"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>

                            <!-- 4 -->

                            <div class="form-group row repuestoRow" id="repuestoRow4" style="display: none">
                                
                                <div class="col-md-7 offset-md-3">
                                    <select name="id_repuesto4" id="id_repuesto4" class="form-select @error('id_repuesto4') is-invalid @enderror repuestoSelect">
                                        <option value="">Seleccione un repuesto</option>
                                        
                                        <?php $find = 0 ?>
                                        @foreach($repuestos as $repuesto)
                                            <option value="{{$repuesto->id.'-'.$repuesto->costo_estimado}}" 
                                             @for($i=0; $i < count($repuestos_selected); $i++)
                                                @if(($repuesto->id == $repuestos_selected[$i]) && $find==0)
                                                    selected
                                                    <?php $find = 1; $repuestos_selected[$i]=false;?>
                                                @endif
                                             @endfor >
                                             {{$repuesto->nombre." ".$repuesto->dimensiones." ".$repuesto->dimensiones_medida." ".$repuesto->capacidad." ".$repuesto->capacidad_medida}}
                                             </option>
                                        @endforeach
                                    </select>
                                    
                                    @error('id_repuesto4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <button type="button" data-rowNumber="4" class="btn btn-danger dropRepuestoRow"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>

                        </div>
                        
                        <hr>

                        <div class="form-group row">
                            <label for="fecha" class="col-md-3 col-form-label text-right">Fecha de compra</label>

                            <div class="col-md-7">
                                <input type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" id="fecha" value="{{ $compra->fecha_compra }}" required autocomplete="off">
                                
                                @error('fecha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="medio_pago" class="col-md-3 col-form-label text-right">Medio de pago</label>

                            <div class="col-md-7">
                                <select name="medio_pago" id="medio_pago" class="form-select @error('medio_pago') is-invalid @enderror" required>
                                    <?php $medio_pago = ['Transferencia', 'Efectivo', 'Divisa'] ?>
                                    <option value="">Seleccione el medio de pago</option>
                                    @for($i=0; $i < count($medio_pago); $i++)
                                        <option value="{{$medio_pago[$i]}}" @if($medio_pago[$i]==$compra->medio_pago) selected @endif >{{$medio_pago[$i]}}</option>
                                    @endfor
                                </select>
                                
                                @error('medio_pago')
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
                                    <?php $estatus = ['En encargo', 'Pago'] ?>
                                    <option value="">Seleccione el estatus de la compra</option>
                                    @for($i=0; $i < count($estatus); $i++)
                                        <option value="{{$estatus[$i]}}" @if($estatus[$i]==$compra->estatus) selected @endif >{{$estatus[$i]}}</option>
                                    @endfor
                                </select>
                                
                                @error('estatus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
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
