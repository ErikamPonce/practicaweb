<?php


//aqeui se reforzó el proceso de inicio de sesión: validación del correo y contraseña, sanitización del correo (trim() y mb_strtolower()), mensajes de error genéricos y control de intentos de autenticación (throttle)
//trim para eliminar espacios en blanco al inicio y al final del correo, y mb_strtolower para convertir el correo a minúsculas, asegurando que las comparaciones de correo sean consistentes y no dependan de mayúsculas o minúsculas.
//mb_strtolower para convertir el correo a minúsculas, asegurando que las comparaciones de correo sean consistentes y no dependan de mayúsculas o minúsculas.



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';
    protected $maxAttempts = 6;
    protected $decayMinutes = 1;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
        $this->middleware('throttle:' . $this->maxAttempts . ',' . $this->decayMinutes)->only('login');
    }

    public function username(): string
    {
        return 'email';
    }

    protected function validateLogin(Request $request): void
    {
        $request->validate([
            $this->username() => ['required', 'string', 'email', 'max:254'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ], [
            $this->username() . '.required' => 'El correo electrónico es obligatorio.',
            $this->username() . '.email' => 'Ingresa un correo electrónico válido.',
            $this->username() . '.max' => 'El correo electrónico no puede exceder 254 caracteres.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.max' => 'La contraseña no puede exceder 255 caracteres.',
        ]);
    }

    protected function credentials(Request $request): array
    {
        return [
            'email' => mb_strtolower(trim($request->string('email')->value())),
            'password' => $request->string('password')->value(),
        ];
    }

    protected function sendFailedLoginResponse(Request $request): void
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
}
