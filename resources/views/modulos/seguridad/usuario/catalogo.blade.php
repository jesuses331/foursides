@extends('layouts.app')
{{-- @section('title', 'Usuarios') --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- <a href="{{ route('usuario.crear') }}" class="btn btn-primary">Crear</a> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1>Catalogo</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Alias</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->usuarioNombre }}</td>
                                <td>{{ $usuario->usuarioEmail }}</td>
                                <td>{{ $usuario->usuarioAlias }}</td>
                                <td>
                                    <a href="{{ route('usuarios.show', $usuario) }}" class="btn btn-info">Adjuntar Foto</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    


    