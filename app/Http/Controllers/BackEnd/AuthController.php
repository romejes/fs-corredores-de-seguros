<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Usuario;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    private $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Autenticar usuario
     *
     * @param LoginRequest $loginRequest
     * @return void
     */
    public function login(LoginRequest $loginRequest)
    {
        $this->usuario->authenticate($loginRequest);
        return response()->json([
            "message" => "Usted ha iniciado sesión"
        ]);
    }

    /**
     * Cerrar la sesión del usuario
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect("intranet/login");
    }
}
