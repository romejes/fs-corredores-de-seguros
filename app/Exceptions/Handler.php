<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return response()->view("web.pages.404");
        }

        return $this->returnJsonResponse($request, $exception);
    }

    /**
     * Devolver respuesta en JSON
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    private function returnJsonResponse($request, Exception $exception)
    {
        if ($exception instanceof ValidationException) {
            return response()->json([
                "statusCode" => Response::HTTP_BAD_REQUEST,
                "messages" => $exception->validator->getMessageBag()
            ], Response::HTTP_BAD_REQUEST);
        }

        if ($exception instanceof RegistroNoEncontradoException) {
            return $exception->render($request);
        }

        if ($exception instanceof HttpException) {
            return response()->json([
                "statusCode" => $exception->getStatusCode(),
                "message" => $exception->getMessage()
            ], $exception->getStatusCode());
        }

        return response()->json([
            "statusCode" => 500,
            "message" => $exception->getMessage()
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
