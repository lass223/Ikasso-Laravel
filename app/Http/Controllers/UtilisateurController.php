<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Client;
use App\Models\Proprietaire;
use Illuminate\Http\Request;
use App\Http\Controllers\BienLocationController;
use App\Http\Controllers\BienVenteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\BienVente;
use App\Models\BienLocation;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index1()
    {
        $utilisateurs = Utilisateur::all();
    //    dd($biens);
       return view('index', compact('utilisateurs'));
    }
    public function index()
{
    $utilisateurs = Utilisateur::all();
    return view('index', compact('utilisateurs')); // Assurez-vous de renvoyer à la vue 'listeUser'
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|max:255|unique:utilisateurs,email',
            'password' => 'required|max:255',
            'adresse' => 'required',
            'birthdate' => 'required',
            'telephone' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'statut' => 'required',
            'id_abonnement' => 'nullable',  // Ajout du champ id_abonnement ici
        ]);
    
        // Hacher le mot de passe avant de l'enregistrer dans la base de données
        $validateData['password'] = Hash::make($validateData['password']);
    
        // Gestion de l'upload de l'image
        $image = $request->file('image');
        $destinationPath = 'images/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $validateData['image'] = $profileImage;
    
        // Créer un client ou un partenaire en fonction du statut
        if ($request->statut == 'client') {
            $client = Client::create($validateData);
        } elseif ($request->statut == 'partenaire') {
            // Assurez-vous que id_abonnement est pris en compte
            $validateData['id_abonnement'] = $request->id_abonnement;
            $partenaire = Proprietaire::create($validateData);
        }
    
        // Créer l'utilisateur
        $utilisateur = Utilisateur::create($validateData);
    
        // Rediriger en fonction du statut
        if ($request->statut == 'client') {
            return redirect()->route('prop-auth/property-grid2');
        } elseif ($request->statut == 'partenaire') {
            return redirect()->route('agree', ['id_pro' => $utilisateur->id]);
        }
    
        return redirect()->route('index');
    }
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $utilisateur = Utilisateur::findOrFail($id); // Utilisez findOrFail pour gérer les cas où l'ID n'existe pas
    return view('editUser', compact('utilisateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'sometimes|max:255',
            'adresse' => 'required|max:255',
            'birthdate' => 'required|max:255',
            'telephone' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'statut' => 'required',
        ]);
    
        // Hash the password only if it is provided
        if (!empty($validateData['password'])) {
            $validateData['password'] = Hash::make($validateData['password']);
        } else {
            unset($validateData['password']); // Remove password from validation data if not provided
        }
    
        // Handle image upload
        $image = $request->file('image');
        $destinationPath = 'images/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $validateData['image'] = $profileImage;
    
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->update($validateData);
    
        // Fetch properties to display in the view
        $bien_ventes = BienVente::all();
        $bien_locatons = BienLocation::all();
    
        return view('property-grid', compact('bien_ventes', 'bien_locatons'));
    }
    

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $utilisateur = Utilisateur::findOrFail($id);
    $utilisateur->delete();

    // Rediriger explicitement vers la route d'affichage de la liste des utilisateurs
    return redirect()->route('admin');
}


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

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();
        if ($user->email === 'skk@big3.com' && Hash::check('big3@2024', $user->password)) {
            return redirect()->route('admin');
        } elseif ($user->statut == 'partenaire') {
            return redirect()->route('showBien');
        } elseif ($user->statut == 'client') {
            return redirect()->route('property-grid');
        }
    }

    return back()->withErrors([
        'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
    ]);
}
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    public function propertyGrid()
    {
        $bien_locations = BienLocation::all();
        $bien_ventes = BienVente::all();
        return view('property-grid', compact('bien_locations', 'bien_ventes'));
    }

    public function propertyGrid2()
    {
        $bien_locations = BienLocation::all();
        $bien_ventes = BienVente::all();
        return view('prop-auth/property-grid2', compact('bien_locations', 'bien_ventes'));
    }
    public function propertyGrid3()
    {
        $bien_locations = BienLocation::all();
        $bien_ventes = BienVente::all();
        return view('clie-auth/property-grid3', compact('bien_locations', 'bien_ventes'));
    }
}


