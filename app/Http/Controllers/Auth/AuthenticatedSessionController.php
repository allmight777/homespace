<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = $request->user();

        // Vérifie si le compte est actif
        if (! $user->isactif) {
            // Déconnecte immédiatement l'utilisateur
            auth()->logout();

            return redirect()->route('login')->withErrors([
                'email' => 'Votre compte est désactivé. Veuillez contacter l\'administrateur.',
            ]);
        }

        $request->session()->regenerate();

        if ($user->isadmin) {
            // Admin actif → redirection vers dashboard
            return redirect()->intended(route('admin.dashboard', absolute: false));
        } else {
            // Utilisateur actif non admin → redirection vers autre route avec message
            return redirect()->route('users')
                ->with('message', 'Vous êtes connecté');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
