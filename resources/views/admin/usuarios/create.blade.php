@extends('layouts.admin')

@section('titulo')
Crear registro
@endsection

@section('contenido')
<h3 class="text-dark mb-4">Usuarios</h3>
<div class="card shadow">
    <div class="card-header py-3">
        <h4>
            Añadir Registro
        </h4>


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

        <form method="POST" enctype="multipart/form-data" action="{{route('usuarios.store')}}">
            @csrf
            <div class="form-group">
                <h5>
                    Tipo de Usuario
                </h5>
               
            </div>
            <select name="usertype" class="form-control" data-toggle="dropdown" aria-expanded="false">
                <option value="Administrador" class="dropdown-item" role="presentation">Administrador</option>
                <option value="Usuario" class="dropdown-item" role="presentation">Usuario</option>
            </select>

            <div class="form-group">
                <h5>
                    Nombre
                </h5>

                <input type="text" name="name" class="form-control"></input>
            </div>
            
            <div class="form-group">
                <h5>
                    Foto
                </h5>

                <input type="file" name="foto" class="form-control"></input>
            </div>
            
            <div class="form-group">
                <h5>
                    Correo
                </h5>

                <input type="text" name="email" class="form-control"></input>
            </div>
            
            <div class="form-group">
                <h5>
                    Contraseña
                </h5>

                <input type="password" name="password" class="form-control"></input>
            </div>
            
            <div class="form-group">
                <h5>
                    Confirmar Contraseña
                </h5>

                <input type="password" name="password-confirm" class="form-control"></input>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>

@endsection