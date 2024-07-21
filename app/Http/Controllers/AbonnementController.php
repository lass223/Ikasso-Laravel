<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abonnements = Abonnement::all();
        return view('admin', compact('abonnements'));
    }

    /**
     * Show the form for creating a new resource.
     */
         public function create()
    {
        return view('admin_abonnement_create');
    }

  /**
     * Store a newly created resource in storage.
     */
    
    
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'type' => 'required|string|max:255',
            'prix' => 'required|numeric',
        ]);
    
        // Créer un nouvel abonnement
        $abonnement = new Abonnement();
        $abonnement->type = $request->type;
        $abonnement->prix = $request->prix;
        $abonnement->save();
    
        // Rediriger avec un message de succès
        return redirect()->route('admin')->with('success', 'Abonnement ajouté avec succès.');
    }
    

    /**
    * Display the specified resource.
    */
   public function show($id)
   {
       $abonnement = Abonnement::findOrFail($id);
       return view('admin.abonnements.show', compact('abonnement'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($id)
   {
       $abonnement = Abonnement::findOrFail($id);
       return view('admin_abonnement_edit', compact('abonnement'));
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $validated = $request->validate([
            'type' => 'required|string',
           'prix' => 'required|numeric',
        ]);

        $abonnement = Abonnement::findOrFail($id);
        $abonnement->update($validated);
        return redirect()->route('admin')->with('success', 'Abonnement mis à jour avec succès.'); }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($id)
   {
       $abonnement = Abonnement::findOrFail($id);
        $abonnement->delete();
       return redirect()->route('admin')->with('success', 'Abonnement supprimé avec succès.');
    }
}
