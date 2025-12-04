<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        //
    }

    /**
     * Qué hacer cuando NO hay sesión (sesión caducada o sin login)
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // API: devolver JSON en vez de redirigir
        if ($this->shouldReturnJson($request, $exception)) {
            return response()->json(['message' => $exception->getMessage()], 401);
        }

        // (Opcional) mensaje de sesión expirada
        // $request->session()->flash('expired', 'Tu sesión ha caducado.');

        // Redirigir SIEMPRE al login
        return redirect()->guest(
            $exception->redirectTo($request) ?? route('/')
        );
    }
}
