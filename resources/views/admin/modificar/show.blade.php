@extends('layouts.admin')

@section('titulo')
        modificar
@endsection

@section('contenido')

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
        <div class="card-body">
           
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID Usuario</th>
                            <th>Estado</th>                  
                            <th>Mantenimiento</th>
                            <th>Switches</th>
                            <th>Material de Keycaps</th>
                            <th>Color de Keycaps</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">{{ $modificar -> id_user}}</td>
                            <td class="text-center">{{ $modificar -> estado}}</td>
                            <td class="text-center">{{ $modificar -> mantenimiento}}</td>
                            <td class="text-center">{{ $modificar -> modelo_switches }}</td>
                            <td class="text-center">{{ $modificar -> material_keycaps}}</td>
                            <td class="text-center">{{ $modificar -> color_keycaps}}</td>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID Usuario</th>
                            <th>Estado</th>                  
                            <th>Mantenimiento</th>
                            <th>Switches</th>
                            <th>Material de Keycaps</th>
                            <th>Color de Keycaps</th>   
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
                    <div class="modal fade" role="dialog" tabindex="-1" id="modalEliminar" style="opacity: 1;filter: blur(0px);height: 600;margin: 100px;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Eliminar registro</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                <div class="modal-body">
                                    <p></p>
                                    <p class="text-center" style="font-size: 16px;">¿Seguro que quieres eliminar la orden:&nbsp; &nbsp; &nbsp;?</p>
                                </div>
                                <div class="modal-footer"><button class="btn btn-light" data-bs-hover-animate="swing" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" data-bs-hover-animate="swing" type="button" style="background-color: #e85464;">Sí, eliminar</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>      

@endsection











