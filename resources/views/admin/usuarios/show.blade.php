@extends('layouts.admin')

@section('titulo')
        Usuarios
@endsection

@section('contenido')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Usuarios</h3>
    <div class="card shadow">
        <div class="card-header py-3">
                Registro #{{ $usuarios -> id}}
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="">{{ $usuarios -> id}}</td>
                            <td class="">{{ $usuarios -> usertype}}</td>
                            <td class="">{{ $usuarios -> name}}</td>
                            <td class="d-lg-flex"><img class="rounded-circle d-lg-flex mr-2" width="30" height="30" src=""></td>
                            <td class="">{{ $usuarios -> email}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

