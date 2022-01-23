<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class RegistroNoEncontradoException extends Exception
{
    public function report()
    {
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function render($request)
    {
        return response()->json([
            "statusCode" => Response::HTTP_NOT_FOUND,
            "message" => $this->getMessage()
        ], Response::HTTP_NOT_FOUND);
    }
}
