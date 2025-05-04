<?php

namespace App\Models\Seguridad;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    use HasFactory;

    protected $table = 'seg_usuario';
    protected $primaryKey = "idUsuario";
    public $timestamps = false;

    protected $fillable = [
        'usuarioAlias',
        'usuarioNombre',
        'usuarioEmail',
        'usuarioPassword',
        'usuarioEstado',
        'usuarioConectado',
        'usuarioUltimaConexion'
    ];

    public function conectar($id, $token)
    {
        $row = Usuario::find($id);
        if ($row) {
            $fecha = date("Y-m-d H:i:s");
            $row->usuarioUltimaConexion = $fecha;
            $row->save();
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function desconectar($id)
    {
        $row = Usuario::find($id);
        if ($row) {
            $row->save();
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function obtenerUsuario($usuarioAlias)
    {
        $usuario = $this->where('usuarioAlias', $usuarioAlias)->first();
        return $usuario;
    }

    function guardarSesion($idUsuario)
    {
        $usuario = $this->find($idUsuario);
        $usuario->usuarioUltimaConexión = date('Y-m-d H:i:s');
        $usuario->save();
        return true;
    }
}
