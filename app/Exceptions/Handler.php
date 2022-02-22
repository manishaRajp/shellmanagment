<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {

            if ($exception instanceof ModelNotFoundException) {

                return response()->json([
                    'error' => 'modal not found'
                ], 400);
            }
            if ($exception instanceof NotFoundHttpException) {

                return response()->json([
                    'error' => 'incorrect route'
                ], 404);
            }
            if ($exception instanceof MethodNotAllowedHttpException) {

                return response()->json([
                    'error' => ' method not supported for this route'
                ], 405);
            }
            if ($exception instanceof AccessDeniedHttpException || $exception instanceof AuthorizationException) {
                return response()->json([
                    'errors' => new \StdClass(),
                    'message' => $exception->getMessage(),
                ], 403);
            }
            if ($exception instanceof ValidationException) {
                foreach ($exception->errors() as $field => $message) {
                    $data[$field] = $message[0];
                }
                return response()->json([
                    'message' => 'The given data was invalid',
                    'error' => $data
                ], 422);
            }
        }
        return parent::render($request, $exception);
    }
}
