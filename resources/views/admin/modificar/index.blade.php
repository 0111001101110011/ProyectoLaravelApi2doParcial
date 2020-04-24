@extends('layouts.admin')

@section('titulo')
        modificar
@endsection

@section('contenido')

@if(Session::has('exito'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>¡Exito!</h5>
        {{Session::get('exito')}}
    </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> ¡Error! </h5>
        {{Session::get('error')}}
    </div>
    @endif

<div class="container-fluid">
    <h3 class="text-dark mb-4">Ordenes para modificar</h3>

    <!-- Checks if the change was made throguh a variable sent in the next(or last)  screen -->
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>
                        <i class="icon fas fa-check"></i> Éxito
                    </h5>
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('failure'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>
                        <i class="icon fas fa-check"></i> Error
                    </h5>
                    {{ Session::get('failure') }}
                </div>
            @endif

    <div class="card shadow">
        <div class="card-header py-3"><a class="btn btn-primary" role="button" href="{{route('modificar.create')}}" ><i class="fa fa-plus"></i>&nbsp; &nbsp;Agregar Registro</a></div>
        <div class="card-body">
            <form action="/search">
                <div class="row">
                    <div class="col-md-4">
                        <select name="filtro" class="form-control" data-toggle="dropdown" aria-expanded="false">
                            <option value="fecha" class="dropdown-item" role="presentation">Filtrar por fecha</option>
                            <option value="estado" class="dropdown-item" role="presentation">Filtrar por estado de la tarea</option>
                            <option value="usuario" class="dropdown-item" role="presentation">Filtrar por usuario</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" aria-controls="dataTable" placeholder="Buscar...">
                    </div>

                    <div class="col-md-4">
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Usuario</th>
                            <th>Estado</th>
                            <th>Fecha-Hora</th>
                            <th>Ubicación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($modificar as $modificado)
                        <tr>
                            <td class="text-center">{{ $modificado -> id }}</td>
                            <td class="text-center">{{ $modificado -> id_user }}</td>
                            <td class="text-center">{{ $modificado -> estado }}</td>
                            <td class="text-center">{{ $modificado -> fecha_hora }}</td>
                            <td class="text-center">{{ $modificado -> ubicacion }}</td>
                            <td>
                                <div class="btn-group" role="group" style="filter: brightness(100%);">
                                    <a class="btn btn-primary" type="button" href="{{ route('modificar.show',$modificado -> id)}}" style="background-color: #4e73df;">  <i class="fa fa-eye"style="color: rgb(255,255,255);" ></i></a>
                                    <a class="btn btn-primary" type="button" href="{{ route('modificar.edit',$modificado -> id)}}" style="background-color: #808080;">  <i class="fa fa-pencil" style="color: rgb(255,255,255);"></i></a>
                                   
                                    @csrf
                                    @method('DELETE')

                                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$modificado->id}})" data-target="#DeleteModal" class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                    </a>
                                    
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>ID</strong></td>
                            <td><strong>ID Usuario</strong></td>
                            <td><strong>Estado</strong></td>
                            <td><strong>Fecha-Hora</strong></td>
                            <td><strong>Ubicación</strong></td>
                            <td><strong>Acciones</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Mostrando 10 de 30<br></p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>

                
                    <div class="modal fade" role="dialog" tabindex="-1" id="DeleteModal" style="opacity: 1;filter: blur(0px);height: 600;margin: 100px;">
                        <div class="modal-dialog" role="document">
                            <form action="" id="deleteForm" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Eliminar registro</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                <div class="modal-body">
                                    
                                    @csrf
                                    @method('DELETE')
                                    
                                    <p class="text-center" style="font-size: 16px;">¿Seguro que quieres eliminar la orden?</p>
                                </div>
                                <div class="modal-footer"><button class="btn btn-light" data-bs-hover-animate="swing" type="button" data-dismiss="modal">Close</button>

                                    <button class="btn btn-primary" name="" data-bs-hover-animate="swing" data-dismiss="modal" type="submit" onclick="formSubmit()" style="background-color: #e85464;">Sí, eliminar</button>
                       

                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>      
<script type="text/javascript">
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("modificar.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }
    function formSubmit()
    {
        $("#deleteForm").submit();
    }
 </script>
@endsection