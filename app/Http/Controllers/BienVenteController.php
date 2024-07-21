<?php

namespace App\Http\Controllers;

use App\Models\BienVente;
use App\Models\BienLocation;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Proprietaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BienVenteController extends Controller
{
    public function index($id_pro)
    {
        $bien_locations = BienLocation::with('images')->where('id_pro', $id_pro)->get();
        $bien_ventes = BienVente::with('images')->where('id_pro', $id_pro)->get();
        return view('showBien', compact('bien_locations', 'bien_ventes', 'id_pro'));
    }

    public function agree($id_pro)
    {
        return view('agree', compact('id_pro'));
    }

    public function create($id_pro)
    {
        return view('formBienVente', compact('id_pro'));
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
            'prix' => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'images' => 'sometimes',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
        ]);
    
        $validateData['id_pro'] = $id_pro;
    
        $bienVente = BienVente::create($validateData);
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $image->getClientOriginalName();
                $path = $image->storeAs('images', $filename, 'public');
                $bienVente->images()->create(['path' => $path]);
            }
        }
    
        return redirect()->route('proprietaire.showBien', ['id_pro' => $id_pro])->with('success', 'Bien créé avec succès');
    }
    

    public function show($id)
    {
        $bien = BienVente::with(['images', 'proprietaire'])->findOrFail($id);
        $images = $bien->images;
        $proprietaire = $bien->proprietaire;
        return view('property-single', compact('bien', 'images', 'proprietaire'));
    }

    public function edit($id_pro, $id)
    {
        $bien_vente = BienVente::with('images')->findOrFail($id);
        return view('editBienVente', compact('bien_vente', 'id_pro'));
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
        'prix' => 'required',
        'ville' => 'required',
        'adresse' => 'required',
        'images' => 'sometimes',
        'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
    ]);

    $bienVente = BienVente::findOrFail($id);
    $bienVente->update($validateData);

    if ($request->hasFile('images')) {
        foreach ($bienVente->images as $oldImage) {
            if (file_exists(public_path('storage/' . $oldImage->path))) {
                unlink(public_path('storage/' . $oldImage->path));
            }
            $oldImage->delete();
        }

        foreach ($request->file('images') as $image) {
            $filename = $image->getClientOriginalName();
            $path = $image->storeAs('images', $filename, 'public');
            $bienVente->images()->create(['path' => $path]);
        }
    }

    return redirect()->route('proprietaire.showBien', ['id_pro' => $id_pro])->with('success', 'Bien mis à jour avec succès');
}
    public function destroy($id_pro, $id)
    {
        $bienVente = BienVente::findOrFail($id);

        foreach ($bienVente->images as $image) {
            if (file_exists(public_path($image->path))) {
                unlink(public_path($image->path));
            }
            $image->delete();
        }

        $bienVente->delete();

        return redirect()->route('proprietaire.showBien', ['id_pro' => $id_pro])->with('success', 'Bien supprimé avec succès');
    }

    public function showBien($id_pro, $id)
    {
        $bien_vente = BienVente::find($id);
        return view('formBienVente', compact('bien_vente', 'id_pro'));
    }

    public function createAdmin()
    {
        $proprietaires = Proprietaire::all();
        return view('admin_vente_create', compact('proprietaires'));
    }

   
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
        'prix' => 'required',
        'ville' => 'required',
        'adresse' => 'required',
        'id_pro' => 'required|exists:proprietaires,id',
        'images' => 'sometimes',
        'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg,webp',
    ]);

    $bienVente = BienVente::create($validateData);

    // Gérer les images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('images', 'public');
            $bienVente->images()->create(['path' => $path]);
        }
    }

    // Redirection vers la méthode showBien du ProprietaireController
    return redirect()->route('admin');
}

    public function editAdmin($id)
    {
        $bienvente = BienVente::with('images')->findOrFail($id);
        $proprietaires = Proprietaire::all();
        return view('admin_vente_edit', compact('bienvente','proprietaires'));
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
        'prix' => 'required|numeric',
        'ville' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'id_pro' => 'required|exists:proprietaires,id',
        'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $bienVente = BienVente::findOrFail($id);
    $bienVente->update($validatedData);

   
        if ($request->hasFile('images')) {
            foreach ($bienVente->images as $oldImage) {
                if (file_exists(public_path($oldImage->path))) {
                    unlink(public_path($oldImage->path));
                }
                $oldImage->delete();
            }

            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $bienVente->images()->create(['path' => $path]);
            }
    }

    return redirect()->route('admin');
}

public function destroyAdmin($id)
{
    $bienVente = BienVente::with('images')->findOrFail($id);

    // Supprimer les images associées
    foreach ($bienVente->images as $image) {
        if (file_exists(public_path($image->path))) {
            unlink(public_path($image->path));
        }
        $image->delete();
    }

    // Supprimer le bien
    $bienVente->delete();

    return redirect()->route('admin')->with('success', 'Bien supprimé avec succès');
}

}