@extends('layouts.admin')

@section('titulo')
Editar registro
@endsection

@section('contenido')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Ordenes para armar</h3>
    <div class="card shadow">
        <div class="card-header py-3"></div>
        <div class="card-body">
                <h2 class="text-center" style="margin-bottom: 26px;">Editar registro</h2>
                <div class="form-row">
                    <div class="col">
             
                        <form method="POST" action="{{route('armar.update', $armar -> id)}}">
                            @csrf
                            @method('PUT')
                            
                            <br>

                            <h4> Estado </h4> 
                            <div class="x-dropdown dropdown">
            
                                <select name="estado" class="border rounded-0 shadow-sm text-left x-drop-btn" data-toggle="dropdown"
                                aria-expanded="false" style="margin-bottom: 22px;filter: grayscale(0%);">
                                <i class="material-icons">keyboard_arrow_down</i> 
                                <option value="Pendiente" class="dropdown-item" role="presentation">Pendiente</option>
                                <option value="En proceso" class="dropdown-item" role="presentation">En proceso</option>
                                <option value="Terminado" class="dropdown-item" role="presentation">Terminado</option>
                              
                                </select>
                         
                            </div>

                            <h4> Switches </h4> 
                            <div class="x-dropdown dropdown">
            
                                <select name="modelo_switches" class="border rounded-0 shadow-sm text-left x-drop-btn" data-toggle="dropdown"
                                aria-expanded="false" style="margin-bottom: 22px;filter: grayscale(0%);">
                                <i class="material-icons">keyboard_arrow_down</i> 
                                <option value="Gateron Blue" class="dropdown-item" role="presentation">Gateron Blue</option>
                                <option value="Cherry MX Red" class="dropdown-item" role="presentation">Cherry MX Red</option>
                                <option value="Kailh BOX White" class="dropdown-item" role="presentation">Kailh BOX White</option>
                                </select>
                         
                            </div>

                            <h4> Material keycaps </h4> 
                            <div class="x-dropdown dropdown">
            
                                <select name="material_keycaps" class="border rounded-0 shadow-sm text-left x-drop-btn" data-toggle="dropdown"
                                aria-expanded="false" style="margin-bottom: 22px;filter: grayscale(0%);">
                                <i class="material-icons">keyboard_arrow_down</i> 
                                <option value="ABS" class="dropdown-item" role="presentation">ABS</option>
                                <option value="PBT" class="dropdown-item" role="presentation">PBT</option>
                                
                                </select>
                         
                            </div>

                            <h4> Color keycaps </h4> 
                            <div class="x-dropdown dropdown">
            
                                <select name="color_keycaps" class="border rounded-0 shadow-sm text-left x-drop-btn" data-toggle="dropdown"
                                aria-expanded="false" style="margin-bottom: 22px;filter: grayscale(0%);">
                                <i class="material-icons">keyboard_arrow_down</i> 
                                <option value="Azul" class="dropdown-item" role="presentation">Azul</option>
                                <option value="Negro" class="dropdown-item" role="presentation">Negro</option>
                                <option value="Blanco" class="dropdown-item" role="presentation">Blanco</option>
                                </select>
                         
                            </div>
                            
                            <h4> Material carcasa </h4> 
                            <div class="x-dropdown dropdown">
            
                                <select name="material_carcasa" class="border rounded-0 shadow-sm text-left x-drop-btn" data-toggle="dropdown"
                                aria-expanded="false" style="margin-bottom: 22px;filter: grayscale(0%);">
                                <i class="material-icons">keyboard_arrow_down</i> 
                                <option value="Acrílico" class="dropdown-item" role="presentation">Acrílico</option>
                                <option value="Plástico" class="dropdown-item" role="presentation">Plástico</option>
                                <option value="Aluminio" class="dropdown-item" role="presentation">Aluminio</option>
                                </select>
                         
                            </div>

                            <h4> Color carcasa </h4> 
                            <div class="x-dropdown dropdown">
            
                                <select name="color_carcasa" class="border rounded-0 shadow-sm text-left x-drop-btn" data-toggle="dropdown"
                                aria-expanded="false" style="margin-bottom: 22px;filter: grayscale(0%);">
                                <i class="material-icons">keyboard_arrow_down</i> 
                                <option value="Negro<" class="dropdown-item" role="presentation">Negro</option>
                                <option value="Blanco" class="dropdown-item" role="presentation">Blanco</option>
                                <option value="Rojo" class="dropdown-item" role="presentation">Rojo</option>
                                </select>
                         
                            </div>
                            
                             <br>

                            <div class="group">
                                <input type="text" name="ubicacion" value="{{$armar -> ubicacion}}" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Ubicación</label>
                            </div>
                    </div>
                </div>
            <button class="btn btn-primary" type="submit" style="margin-top: 15px;">Guardar</button> 
            <a class="btn btn-primary" role="button" href="{{route('armar.create')}}" style="margin-top: 15px;margin-left: 8px;background-color: rgb(207,90,82);"> Cancelar </a>
        </div>
        </form>

      

    </div>
</div>
</div>

@endsection