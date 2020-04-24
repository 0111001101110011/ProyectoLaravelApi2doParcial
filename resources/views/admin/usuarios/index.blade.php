
@extends('layouts.admin')

@section('titulo')
        Usuarios
@endsection

@section('contenido')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Usuarios</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="{{ route('usuarios.create') }}">
                <i class="fa fa-plus"></i> Agregar Registro
            </a>
        </div>

        <div class="card-body">

            <!-- Checks if the change was made through a variable sent in the next (or last) screen -->
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
            
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo de Usuario</th>
                            <th>Nombre</th>
                            <th>Foto</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario -> id}}</td>
                            <td>{{ $usuario -> usertype}}</td>
                            <td>{{ $usuario -> name}}</td>
                            <td> <img class="rounded-circle d-lg-flex mr-2" width="30" height="30" src="" /></td>
                            <td>{{ $usuario -> email}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <!-- Show -->
                                    <a class="btn btn-primary" type="button" href="{{ route('usuarios.show', $usuario -> id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <!-- Edit -->
                                    <a class="btn btn-primary" type="button" href="{{ route('usuarios.edit', $usuario -> id) }}" style="background-color: #808080;">  
                                        <i class="fa fa-pencil" style="color: rgb(255,255,255);"></i>
                                    </a>

                                    <!-- Delete -->
                                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $usuario -> id }})" data-target="#delete-modal" class="btn btn-danger delete-modal-btn">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>ID</strong></td>
                            <td><strong>Tipo de Usuario</strong></td>
                            <td><strong>Nombre</strong></td>
                            <td><strong>Foto</strong></td>
                            <td><strong>Correo</strong></td>
                            <td><strong>Acciones</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                        Mostrando del 1 al 10
                    </p>
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
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form id="deleteForm" method="post" action="{{ route('usuarios.destroy', $usuario  -> id ?? '') }}" >
        @csrf
        @method('DELETE')
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true" style="opacity: 1;filter: blur(0px);height: 600;margin: 100px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">¿Seguro de que desea eliminar el registro?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        No será posible recuperar la información de dicho registro
                    </div>


                    <div class="modal-footer">
                        <button type="button"class="btn btn-light" data-bs-hover-animate="swing" data-dismiss="modal">
                            Descartar
                        </button>

                        <button type="submit" class="btn btn-primary" data-bs-hover-animate="swing" style="background-color: #e85464;" name="delete_noticia" onclick="formSubmit()">
                            Eliminar
                        </button>

                    </div>
                </div>
            </div>
        </div>  
</div>

@endsection

