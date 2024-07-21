<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BienVente;
use App\Models\BienLocation;

class BienRechercheController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Rechercher les biens en vente
        $bien_ventes = BienVente::where('type', 'LIKE', "$query%")
                                ->orWhere('adresse', 'LIKE', "$query%")
                                ->get();
                                
        // Rechercher les biens en location
        $bien_locations = BienLocation::where('type', 'LIKE', "$query%")
                                      ->orWhere('adresse', 'LIKE', "$query%")
                                      ->get();

        return view('search_results', compact('bien_ventes', 'bien_locations'));
    }

    public function search3(Request $request)
    {
        $query = $request->input('query');

        // Rechercher les biens en vente
        $bien_ventes = BienVente::where('type', 'LIKE', "$query%")
                                ->orWhere('adresse', 'LIKE', "$query%")
                                ->get();
                                
        // Rechercher les biens en location
        $bien_locations = BienLocation::where('type', 'LIKE', "$query%")
                                      ->orWhere('adresse', 'LIKE', "$query%")
                                      ->get();

        return view('clie-auth.search_results', compact('bien_ventes', 'bien_locations'));
    }
}
