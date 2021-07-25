<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Throwable;

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
        // $this->reportable(function (Throwable $e) {
        //     return response()->json(['error' => $e], Response::HTTP_INTERNAL_SERVER_ERROR);
        // });

        $this->renderable(function (Throwable $e, $request) {
            if ($request->is('api/*')) {

                if($e instanceof ValidationException){
                    return response()->json([
                        'errors' => $e->validator->errors()->getMessages()
                    ], Response::HTTP_BAD_REQUEST);
                }

                if ($e instanceof NotFoundHttpException) {
                    return response()->json(['error' => 'Not Found'], Response::HTTP_NOT_FOUND);
                }
                if ($e instanceof MethodNotAllowedHttpException) {
                    return response()->json(['error' => 'Not Method Alowed'], Response::HTTP_METHOD_NOT_ALLOWED);
                }
                return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        });
    }
}
