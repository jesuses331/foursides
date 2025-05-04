@extends('layouts.app')
{{-- @section('title', 'Usuarios') --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
              
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Detalle de Usuario</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $usuario->profile_image) }}" alt="Foto de perfil" class="img-fluid rounded-circle">
                            <form action="{{ route('usuarios.update', $usuario) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mt-3">
                                    <label for="profile_image">Cambiar foto de perfil</label>
                                    <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                                </div>
                                <img id="imagen-previa" src="#" alt="Previa de la imagen" style="max-width: 200px; max-height: 200px;">
                                <script>
                                    const fileInput = document.getElementById('profile_image');
                                    const img = document.getElementById('imagen-previa');
                                    fileInput.addEventListener('change', (e) => {
                                        const file = e.target.files[0];
                                        const url = URL.createObjectURL(file);
                                        img.src = url;
                                    });
                                </script>
                                <button type="submit" class="btn btn-primary mt-2">Subir</button>
                                
                            </form>
                            <a href="{{route('usuarios.catalogo')}}">Ir a catalogo</a>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-striped">
                                <tr>
                                    <th>Nombre:</th>
                                    <td>{{ $usuario->usuarioNombre }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $usuario->usuarioEmail }}</td>
                                </tr>
                                <tr>
                                    <th>Alias:</th>
                                    <td>{{ $usuario->usuarioAlias }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    


    