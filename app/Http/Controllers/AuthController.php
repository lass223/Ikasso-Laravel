<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Vérification spécifique pour "skk@big3.com" et "admin@2000"
    if ($credentials['email'] === 'admin@ikasso.com' && $credentials['password'] === 'admin1') {
        Log::info('Admin authenticated');
        $request->session()->regenerate();
        return redirect()->route('admin')->with('success', 'Connexion réussie en tant qu\'admin');
    } elseif (Auth::guard('proprietaire')->attempt($credentials)) {
        Log::info('Proprietaire authenticated');
        $request->session()->regenerate();
        $id_pro = Auth::guard('proprietaire')->id();
        return redirect()->route('proprietaire.showBien', ['id_pro' => $id_pro])->with('success', 'Connexion réussie');
    } elseif (Auth::guard('client')->attempt($credentials)) {
        Log::info('Client authenticated');
        $request->session()->regenerate();
        return redirect()->route('clie-auth/property-grid3')->with('success', 'Connexion réussie');
    }

    Log::warning('Authentication failed');
    return back()->withErrors([
        'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
    ])->withInput();
}

    public function logout(Request $request)
    {
        if (Auth::guard('proprietaire')->check()) {
            Auth::guard('proprietaire')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('success', 'Déconnexion réussie');
        } elseif (Auth::guard('client')->check()) {
            Auth::guard('client')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('success', 'Déconnexion réussie');
        }

        return redirect()->route('login')->with('error', 'Erreur lors de la déconnexion.');
    }
}

