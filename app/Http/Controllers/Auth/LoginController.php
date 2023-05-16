<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';
    protected $redirectAfterLogout = '/login';

    protected function authenticated(Request $request, $user)
    {
        $type = $user->acc_type;
        if ($type == 1) {
            return redirect('personal/dashboard');
        } elseif ($type == 2) {
            return redirect('dashboard');
        } else {
            return redirect('login');
        }
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('Ces identifiants ne correspondent pas à nos enregistrements.')],
            'password' => [trans('Le mot de passe fourni est incorrect.')],
        ])->redirectTo($this->loginPath());
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect($this->redirectAfterLogout);
    }

    protected function loginPath()
    {
        return '/login'; // Remplacez '/login' par le chemin de votre page de connexion
    }
}
