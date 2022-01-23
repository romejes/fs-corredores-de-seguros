<?php

namespace App\Models;

use App\Exceptions\RegistroNoEncontradoException;
use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;

class Usuario extends Model implements AuthAuthenticatable
{
    use Authenticatable;

    protected $table = "Usuario";

    protected $primaryKey = "IdUsuario";

    public $incrementing = true;

    public $timestamps = false;

    /**
     * Retorna el campo que almacena la contraseña del usuario y que será
     * de utilidad para el metodo de Autenticación de Laravel
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->Clave;
    }

    /**
     * Retorna el valor del campo remember_token
     * En este caso, al no ser de utilidad el campo retorna un valor nulo
     *
     * @return string
     */
    public function getRememberToken()
    {
        return null;
    }

    /**
     * Retorna el nombre personalizado del campo que actuará como "remember_token"
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return null;
    }

    /**
     * Autentica el usuario en la aplicacion
     *
     * @param LoginRequest $loginRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(LoginRequest $loginRequest)
    {
        $credentials = [
            "NombreUsuario" => $loginRequest->input("usuario"),
            "password" => $loginRequest->input("contrasena")
        ];

        if (!Auth::attempt($credentials, false)) {
            throw new RegistroNoEncontradoException("El usuario y/o contraseña no son correctos");
        }
    }
}
