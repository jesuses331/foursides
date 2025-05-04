<?php

namespace App\Http\Controllers\Seguridad;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_image', $filename, 'public');

            // Delete old profile picture if exists
            if ($usuario->profile_picture) {
                Storage::disk('public')->delete($usuario->profile_image);
            }

            // Update user's profile picture path
            $usuario->profile_image = $filePath;
            $usuario->save();
            return redirect()->route('usuarios.show', $usuario)->with('success', 'Cambio exitoso!.');
        }

        
    }
    public function show(Usuario $usuario)
    {
        return view("modulos.seguridad.usuario.detalle", compact("usuario"));
    }
    public function catalogo()
    {
        $usuarios = Usuario::all();
        return view("modulos.seguridad.usuario.catalogo", compact('usuarios'));
    }
}
