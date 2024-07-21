<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Proprietaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\BienVente;
use App\Models\BienLocation;
use App\Models\Client;
use App\Models\Image;

class ProprietaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
{
    $proprietaires = Proprietaire::all();
    return view('admin', compact('proprietaires')); // Assurez-vous de renvoyer à la vue 'listeUser'
}

public function showContact()
{
    $id_pro = Auth::guard('proprietaire')->user()->id;
    return view('prop-auth.contact2', compact('id_pro'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formUser1');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validateData = $request->validate([
        'nom' => 'required|max:255',
        'prenom' => 'required|max:255',
        'email' => 'required|max:255|unique:proprietaires,email',
        'password' => 'required|max:255',
        'adresse' => 'required',
        'birthdate' => 'required',
        'telephone' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webpg',
        'statut' => 'required',
        'id_abonnement' => 'nullable',

    ]);

    // Hash the password before saving it to the database
    $validateData['password'] = Hash::make($validateData['password']);

    // Handle image upload
    $image = $request->file('image');
    $destinationPath = 'images/';
    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    $image->move($destinationPath, $profileImage);
    $validateData['image'] = $profileImage;

    // Create proprietaire
    $proprietaire = Proprietaire::create($validateData);

    // Redirect to agree page
    return view('agree', compact('id_pro'));
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
    $proprietaire = Proprietaire::findOrFail($id); // Utilisez findOrFail pour gérer les cas où l'ID n'existe pas
    return view('editProprietaire', compact('proprietaire'));
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




        $proprietaire = Proprietaire::findOrFail($id);
        // Mettez à jour les attributs du modèle avec les données validées
        $proprietaire->update($validateData);

        
    return redirect()->route('admin');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
  {
    $proprietaire = Proprietaire::findOrFail($id);
    $proprietaire->delete();

    // Rediriger explicitement vers la route d'affichage de la liste des utilisateurs
    return redirect()->route('admin');
  }


  public function showLoginForm()
  {
      return view('login'); // Assurez-vous d'avoir une vue de connexion
  }

  public function login(Request $request)
  {
      return app(AuthController::class)->loginProprietaire($request);
  }

  public function logout(Request $request)
  {
      return app(AuthController::class)->logoutProprietaire($request);
  }

  public function showBien($id_pro)
{
    $images= Image::all();
    $bien_locations = BienLocation::where('id_pro', $id_pro)->get();
    $bien_ventes = BienVente::where('id_pro', $id_pro)->get();
    $id_pro = Auth::user()->id; // ou votre logique pour obtenir l'ID du propriétaire
   
    return view('showBien', compact('bien_locations', 'bien_ventes', 'id_pro'));
 
}



public function createAdmin()
{
    $abonnements = Abonnement::all();
    return view('admin_proprietaire_create', compact('abonnements'));
}

public function storeAdmin(Request $request)
{
$validateData = $request->validate([
    'nom' => 'required|max:255',
    'prenom' => 'required|max:255',
    'email' => 'required|max:255|unique:proprietaires,email',
    'password' => 'required|max:255',
    'adresse' => 'required',
    'birthdate' => 'required',
    'telephone' => 'required',
    'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webpg',
    'statut' => 'required',
    'id_abonnement' => 'nullable',
]);

// Hash the password before saving it to the database
$validateData['password'] = Hash::make($validateData['password']);

// Handle image upload
$image = $request->file('image');
$destinationPath = 'images/';
$profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
$image->move($destinationPath, $profileImage);
$validateData['image'] = $profileImage;

// Create proprietaire
$proprietaire = Proprietaire::create($validateData);

// Redirect to agree page
return redirect()->route('admin');
}
public function editAdmin($id)
{
$proprietaire = Proprietaire::findOrFail($id);
$abonnements = Abonnement::all(); // Récupère tous les abonnements

return view('admin_proprietaire_edit', compact('proprietaire', 'abonnements'));
}


public function updateAdmin(Request $request, string $id)
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
        'id_abonnement' => 'nullable',
        
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



    $proprietaire = Proprietaire::findOrFail($id);
    // Mettez à jour les attributs du modèle avec les données validées
    $proprietaire->update($validateData);

    
return redirect()->route('admin');
}



public function destroyAdmin(string $id)
{
$proprietaire = Proprietaire::findOrFail($id);
$proprietaire->delete();

// Rediriger explicitement vers la route d'affichage de la liste des utilisateurs
return redirect()->route('admin');
}


}