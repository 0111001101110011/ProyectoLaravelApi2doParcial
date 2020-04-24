@extends('layouts.admin')

@section('titulo')
Editar registro
@endsection

@section('contenido')
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

            <form method="POST" action="{{route('usuarios.update', $usuarios -> id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <h5>
                        Tipo de Usuario
                    </h5>

                    <select name="usertype" class="form-control" data-toggle="dropdown" aria-expanded="false">
                       
                        <option value="{{ $usuarios -> usertype }}" class="dropdown-item" role="presentation">{{ $usuarios -> usertype }}</option>
                        
                        @if($usuarios->usertype == "Administrador")
                        <option value="Usuario" class="dropdown-item" role="presentation">Usuario</option>
                        @else
                        <option value="Administrador" class="dropdown-item" role="presentation">Administrador</option>
                        @endif

                    </select>
                </div>

                <div class="form-group">
                    <h5>
                        Nombre
                    </h5>

                    <input type="text" name="name" class="form-control" value="{{ $usuarios -> name }}"></input>
                </div>
                
                <div class="form-group">
                    <h5>
                        Foto
                    </h5>

                    <input type="file" name="foto" class="form-control" value="{{ $usuarios -> foto }}"></input>
                </div>
                
                <div class="form-group">
                    <h5>
                        Correo
                    </h5>

                    <input type="text" name="email" class="form-control" value="{{ $usuarios -> email }}"></input>
                </div>
                
                <div class="form-group">
                    <input type="hidden" name="password" class="form-control" value="{{ $usuarios -> password }}"></input>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection