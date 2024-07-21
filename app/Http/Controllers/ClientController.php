<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Proprietaire;
use App\Models\BienLocation;
use App\Models\BienVente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */

    
     public function index()
     {
         $clients = Client::all();
         $bien_ventes = BienVente::all(); // Assurez-vous d'importer le modèle BienVente si nécessaire
         $bien_locations = BienLocation::all(); // Assurez-vous d'importer le modèle BienLocation si nécessaire
         $proprietaires = Proprietaire::all(); // Assurez-vous d'importer le modèle Proprietaire si nécessaire
     
         return view('admin', compact('clients', 'bien_ventes', 'bien_locations', 'proprietaires'));
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
    $validatedData = $request->validate([
        'nom' => 'required|max:255',
        'prenom' => 'required|max:255',
        'email' => 'required|max:255|unique:utilisateurs,email',
        'password' => 'required|max:255',
        'adresse' => 'required',
        'birthdate' => 'required',
        'telephone' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp',
        'statut' => 'required|in:client,partenaire',
       
    ]);


    // Hash the password before saving it to the database
    $validateData['password'] = Hash::make($validatedData['password']);

    $image = $request->file('image');
    $destinationPath = 'images/';
    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    $image->move($destinationPath, $profileImage);
    $validateData['image'] = $profileImage;
    // Create client
    $client = Client::create($validateData);

    // Redirect to property grid
    return view('property-grid', compact('bien_ventes', 'bien_locations'));
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
        $client = Client::findOrFail($id); // Utilisez findOrFail pour gérer les cas où l'ID n'existe pas
    return view('editClient', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // dd($request->all());
         $validateData= $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'adresse' => 'required|max:255',
            'birthdate' => 'required|max:255',
            'telephone' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webpg',
            'statut' => 'required',
            
        ]);
        // Hash the password only if it is provided
    if (!empty($validateData['password'])) {
        $validateData['password'] = Hash::make($validateData['password']);
    } else {
        unset($validateData['password']); // Remove password from validation data if not provided
    }


        $image = $request->file('image');
        $destinationPath = 'images/';
        $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $validateData['image'] = $profileImage;




        $clients = Client::findOrFail($id);
        // Mettez à jour les attributs du modèle avec les données validées
        $clients->update($validateData);

        return redirect()->route('admin');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
    
        // Rediriger vers la page d'administration après suppression
        return redirect()->route('admin');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        return app(AuthController::class)->loginClient($request);
    }

    public function logout(Request $request)
    {
        return app(AuthController::class)->logoutClient($request);
    }


    public function createAdmin()
    {
        return view('admin_client_create');
    }

public function storeAdmin(Request $request)
{
    $validateData = $request->validate([
        'nom' => 'required|max:255',
        'prenom' => 'required|max:255',
        'email' => 'required|max:255|unique:clients,email',
        'password' => 'required|max:255',
        'adresse' => 'required',
        'birthdate' => 'required',
        'telephone' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webpg',
    ]);

    // Hash the password before saving it to the database
    $validateData['password'] = Hash::make($validateData['password']);

    // Handle image upload
    $image = $request->file('image');
    $destinationPath = 'images/';
    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    $image->move($destinationPath, $profileImage);
    $validateData['image'] = $profileImage;

    // Create client
    $client = Client::create($validateData);

    return redirect()->route('admin');
}
    public function editAdmin(string $id)
    {
        $client = Client::findOrFail($id); // Utilisez findOrFail pour gérer les cas où l'ID n'existe pas
    return view('admin_client_edit', compact('client'));
    }

 
    public function updateAdmin(Request $request, string $id)
    {
        // Validation des champs
        $validateData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'nullable|max:255',
            'adresse' => 'required|max:255',
            'birthdate' => 'required|date',
            'telephone' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
           
        ]);
    
        // Si un mot de passe est fourni, le hacher
        if (!empty($validateData['password'])) {
            $validateData['password'] = Hash::make($validateData['password']);
        } else {
            unset($validateData['password']); // Retirer le champ mot de passe si non fourni
        }
    
        // Gestion de l'image si elle est fournie
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validateData['image'] = $profileImage;
        } else {
            unset($validateData['image']); // Retirer le champ image si non fourni
        }
    
        // Trouver le client et mettre à jour les données
        $client = Client::findOrFail($id);
        $client->update($validateData);
    
        // Redirection après mise à jour
        return redirect()->route('admin');
    }
    

    


    public function destroyAdmin(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
    
        // Rediriger vers la page d'administration après suppression
        return redirect()->route('admin');
    }

}