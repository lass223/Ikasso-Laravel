<?php

namespace App\Http\Controllers;

use App\Models\BienLocation;
use App\Models\BienVente;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Proprietaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BienLocationController extends Controller
{
    public function index($id_pro)
{
    $bien_locations = BienLocation::with('images')->where('id_pro', $id_pro)->get();
    $bien_ventes = BienVente::with('images')->where('id_pro', $id_pro)->get();
    return view('showBien', compact('bien_locations', 'bien_ventes', 'id_pro'));
}

    public function agree($id_pro)
    {
        // Passer $id_pro à la vue
        return view('agree', compact('id_pro'));
    }

    public function create($id_pro)
    {
        return view('formBienLocation', compact('id_pro'));
    }
    
    public function store(Request $request, $id_pro)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'type' => 'required|max:255',
            'description' => 'required',
            'surface' => 'required',
            'piece' => 'required',
            'chambre' => 'required',
            'etage' => 'required',
            'loyer' => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'images' => 'sometimes',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
        ]);
    
        $validateData['id_pro'] = $id_pro;
    
        $bienLocation = BienLocation::create($validateData);
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $bienLocation->images()->create(['path' => $path]);
            }
        }
    
        return redirect()->route('proprietaire.showBien', ['id_pro' => $id_pro])->with('success', 'Bien créé avec succès');
    }
    

    public function show($id)
    {
        $bien = BienLocation::with(['images', 'proprietaire'])->findOrFail($id);
        $images = $bien->images;
        $proprietaire = $bien->proprietaire;
        return view('property-single', compact('bien', 'images', 'proprietaire'));
    }
    

    public function edit($id_pro, $id)
    {
        $bien_location = BienLocation::with('images')->findOrFail($id);
        return view('editBienLocation', compact('bien_location', 'id_pro'));
    }

    public function update(Request $request, $id_pro, $id)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'type' => 'required|max:255',
            'description' => 'required',
            'surface' => 'required',
            'piece' => 'required',
            'chambre' => 'required',
            'etage' => 'required',
            'loyer' => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'images' => 'sometimes',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
        ]);

        $bienLocation = BienLocation::findOrFail($id);
        $bienLocation->update($validateData);

        if ($request->hasFile('images')) {
            foreach ($bienLocation->images as $oldImage) {
                if (file_exists(public_path($oldImage->path))) {
                    unlink(public_path($oldImage->path));
                }
                $oldImage->delete();
            }

            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $bienLocation->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('proprietaire.showBien', ['id_pro' => $id_pro])->with('success', 'Bien mis à jour avec succès');
    }
    public function delete() {


    }

    public function destroy($id_pro, $id)
    {
        $bienLocation = BienLocation::findOrFail($id);

        foreach ($bienLocation->images as $image) {
            if (file_exists(public_path($image->path))) {
                unlink(public_path($image->path));
            }
            $image->delete();
        }

        $bienLocation->delete();

        return redirect()->route('proprietaire.showBien', ['id_pro' => $id_pro])->with('success', 'Bien supprimé avec succès');
    }

    public function showBien($id_pro, $id)
    {
        $bien_location = BienLocation::find($id);
        return view('formBienLocation', compact('bien_location', 'id_pro'));
    }


public function createAdmin()
{
    $proprietaires = Proprietaire::all();
    return view('admin_location_create', compact('proprietaires'));
}

/**
 * Store a newly created resource in storage.
 */
public function storeAdmin(Request $request)
{
    $validateData = $request->validate([
        'title' => 'required|max:255',
        'type' => 'required|max:255',
        'description' => 'required',
        'surface' => 'required',
        'piece' => 'required',
        'chambre' => 'required',
        'etage' => 'required',
        'loyer' => 'required',
        'ville' => 'required',
        'adresse' => 'required',
        'id_pro' => 'required|exists:proprietaires,id',
        'images' => 'sometimes',
        'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
    ]);

    $bienLocation = BienLocation::create($validateData);

    // Gérer les images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('images', 'public');
            $bienLocation->images()->create(['path' => $path]);
        }
    }

    // Redirection vers la méthode showBien du ProprietaireController
    return redirect()->route('admin');
}

public function editAdmin($id)
{
    $bienlocation = BienLocation::with('images')->findOrFail($id);
    $proprietaires = Proprietaire::all();
    return view('admin_location_edit', compact('bienlocation','proprietaires'));
}

public function updateAdmin(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'description' => 'required|string',
        'surface' => 'required|numeric',
        'piece' => 'required|numeric',
        'chambre' => 'required|numeric',
        'etage' => 'required|numeric',
        'loyer' => 'required|numeric',
        'ville' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'id_pro' => 'required|exists:proprietaires,id',
        'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $bienLocation = BienLocation::findOrFail($id);
    $bienLocation->update($validatedData);

   
        if ($request->hasFile('images')) {
            foreach ($bienLocation->images as $oldImage) {
                if (file_exists(public_path($oldImage->path))) {
                    unlink(public_path($oldImage->path));
                }
                $oldImage->delete();
            }

            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $bienLocation->images()->create(['path' => $path]);
            }
    }

    return redirect()->route('admin');
}

public function destroyAdmin($id)
{
    $bienLocation = BienLocation::with('images')->findOrFail($id);

    // Supprimer les images associées
    foreach ($bienLocation->images as $image) {
        if (file_exists(public_path($image->path))) {
            unlink(public_path($image->path));
        }
        $image->delete();
    }

    // Supprimer le bien
    $bienLocation->delete();

    return redirect()->route('admin')->with('success', 'Bien supprimé avec succès');
}


}