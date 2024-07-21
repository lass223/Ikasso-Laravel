<?php

use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BienLocationController;
use App\Http\Controllers\BienVenteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\BienRechercheController;

use App\Http\Controllers\MessageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ChatController;
use App\Models\Abonnement;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/formUser', function () {
    $abonnements = Abonnement::all(); // Récupérer tous les abonnements depuis la base de données
    return view('formUser', compact('abonnements'));
})->name('formUser');


Route::get('/property-grid', [UtilisateurController::class, 'propertyGrid'])->name('property-grid');

Route::get('/showBien', function () {
    $bien_locations = App\Models\BienLocation::all();
    $bien_ventes = App\Models\BienVente::all();
    return view('showBien', compact('bien_locations', 'bien_ventes'));
})->name('showBien');



Route::view('/agree', 'agree')->name('agree');
Route::view('/index', 'index')->name('index');
Route::view('/blog-grid', 'blog-grid')->name('blog-grid');
Route::view('/blog-single', 'blog-single')->name('blog-single');
Route::view('/contact', 'contact')->name('contact');
Route::view('/about', 'about')->name('about');
Route::view('/agents-grid', 'agents-grid')->name('agents-grid');
Route::view('/agent-single', 'agent-single')->name('agent-single');

Route::get('/admin', function () {
    $utilisateurs = App\Models\Utilisateur::all();
    $bien_locations = App\Models\BienLocation::with(['images' , 'proprietaire'])->get();
    $clients = App\Models\Client::all();
    $proprietaires = App\Models\Proprietaire::all(); 
    $bien_ventes = App\Models\BienVente::with(['images', 'proprietaire'])->get(); // Chargez les images et les propriétaires ici
    $abonnements = App\Models\Abonnement::all();
    $images = App\Models\Image::all();
    return view('admin', compact('utilisateurs', 'bien_locations', 'bien_ventes', 'clients', 'proprietaires', 'abonnements', 'images'));
})->name('admin');



Route::resource('utilisateurs', UtilisateurController::class);
Route::resource('clients', ClientController::class);
Route::resource('proprietaires', ProprietaireController::class);
Route::resource('abonnements', AbonnementController::class);

Route::get('bien-vente/{id}', [BienVenteController::class, 'show'])->name('bien_vente.show');
Route::get('bien-location/{id}', [BienLocationController::class, 'show'])->name('bien_location.show');

Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

Route::get('/proprietaires/{id}/edit', [ProprietaireController::class, 'edit'])->name('proprietaires.edit');
Route::delete('/proprietaires/{id}', [ProprietaireController::class, 'destroy'])->name('proprietaires.destroy');



Route::post('/abonnements', [AbonnementController::class, 'store'])->name('abonnements.store');
Route::get('/abonnements', [AbonnementController::class, 'create'])->name('abonnements.create');


Route::get('/client/createAdmin', [ClientController::class, 'createAdmin'])->name('client.createAdmin');
Route::post('/client/storeAdmin', [ClientController::class, 'storeAdmin'])->name('client.storeAdmin');
Route::get('/client/editAdmin/{id}', [ClientController::class, 'editAdmin'])->name('client.editAdmin');
Route::put('/client/updateAdmin/{id}', [ClientController::class, 'updateAdmin'])->name('client.updateAdmin');
Route::delete('/client/destroyAdmin/{id}', [ClientController::class, 'destroyAdmin'])->name('client.destroyAdmin');

// routes/web.php


Route::get('/proprietaire/createAdmin', [ProprietaireController::class, 'createAdmin'])->name('proprietaire.createAdmin');
Route::post('/proprietaire/storeAdmin', [ProprietaireController::class, 'storeAdmin'])->name('proprietaire.storeAdmin');
Route::get('/proprietaire/{id}/editAdmin', [ProprietaireController::class, 'editAdmin'])->name('proprietaire.editAdmin');
Route::put('/proprietaire/updateAdmin/{id}', [ProprietaireController::class, 'updateAdmin'])->name('proprietaire.updateAdmin');
Route::delete('/proprietaire/destroyAdmin/{id}', [ProprietaireController::class, 'destroyAdmin'])->name('proprietaire.destroyAdmin');

Route::get('/admin/vente/createAdmin', [BienVenteController::class, 'createAdmin'])->name('bienvente.createAdmin');
Route::post('/admin/vente/storeAdmin', [BienVenteController::class, 'storeAdmin'])->name('bienvente.storeAdmin');
Route::get('/admin/bienvente/{id}/editAdmin', [BienVenteController::class, 'editAdmin'])->name('bienvente.editAdmin');
Route::put('/admin/bienvente/{id}', [BienVenteController::class, 'updateAdmin'])->name('bienvente.updateAdmin');
Route::delete('/admin/bien-vente/{id}', [BienVenteController::class, 'destroyAdmin'])->name('bienvente.destroyAdmin');


Route::get('/admin/location/create', [BienLocationController::class, 'createAdmin'])->name('bienlocation.createAdmin');
Route::post('/admin/location/store', [BienLocationController::class, 'storeAdmin'])->name('bienlocation.storeAdmin');
Route::get('/admin/location/{id}/edit', [BienLocationController::class, 'editAdmin'])->name('bienlocation.editAdmin');
Route::put('/admin/location/{id}', [BienLocationController::class, 'updateAdmin'])->name('bienlocation.updateAdmin');
Route::delete('/admin/location/{id}', [BienLocationController::class, 'destroyAdmin'])->name('bienlocation.destroyAdmin');


// Auth routes

Auth::routes(['verify' => true]);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');



Route::group(['middleware' => ['auth:client', 'verified']], function () {

    
Route::get('/recherche-biens3', [BienRechercheController::class, 'search3'])->name('biens.search3');
    

    Route::resource('bien_ventes', BienVenteController::class);
    Route::resource('bien_locations', BienLocationController::class);
    Route::view('/clie-auth/index3', 'clie-auth/index3')->name('clie-auth/index3');
    // Route::get('/clie-auth/property-grid3', [UtilisateurController::class, 'propertyGrid3'])->name('clie-auth/property-grid3');
    Route::view('/clie-auth/about3', 'clie-auth/about3')->name('clie-auth/about3');
    Route::view('/clie-auth/blog-grid3', 'clie-auth/blog-grid3')->name('clie-auth/blog-grid3');
    Route::view('/clie-auth/agents-grid3', 'clie-auth/agents-grid3')->name('clie-auth/agents-grid3');
    Route::view('/clie-auth/contact3', 'clie-auth/contact3')->name('clie-auth/contact3');
Route::get('/utilisateurs', function () {
    $bien_locations = App\Models\BienLocation::with('images')->get();
    $bien_ventes = App\Models\BienVente::with('images')->get();
    return view('clie-auth/property-grid3', compact('bien_locations', 'bien_ventes'));
})->name('clie-auth/property-grid3');

Route::get('/messages/create/{proprietaireId}', [MessageController::class, 'create'])->name('messages.create');
Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
Route::get('client/messages', [MessageController::class, 'clientIndex'])->name('client.messages.index');
Route::get('client/messages/{message}/reply', [MessageController::class, 'clientReplyForm'])->name('client.messages.replyForm');
Route::post('client/messages/{message}/reply', [MessageController::class, 'clientReply'])->name('client.messages.reply');

});



Route::group(['middleware' => ['auth:proprietaire', 'verified']], function () {
    // Routes pour BienVenteController
    Route::get('/proprietaire/{id_pro}/showBien', [BienVenteController::class, 'index'])->name('proprietaire.showBien');
    Route::get('/bien_ventes/{id_pro}/create', [BienVenteController::class, 'create'])->name('bien_ventes.create');
    Route::post('/bien_ventes/{id_pro}/store', [BienVenteController::class, 'store'])->name('bien_ventes.store');
    Route::get('/bien_ventes/{id_pro}/{id}/edit', [BienVenteController::class, 'edit'])->name('bien_ventes.edit');
    Route::post('/bien_ventes/{id_pro}/{id}', [BienVenteController::class, 'update'])->name('bien_ventes.update');
    Route::delete('/bien_ventes/{id_pro}/{id}', [BienVenteController::class, 'destroy'])->name('bien_ventes.destroy');

    // Routes pour BienLocationController
    Route::get('/proprietaire/{id_pro}/showBien', [BienLocationController::class, 'index'])->name('proprietaire.showBien');
    Route::get('/bien_locations/{id_pro}/create', [BienLocationController::class, 'create'])->name('bien_locations.create');
    Route::post('/bien_locations/{id_pro}/store', [BienLocationController::class, 'store'])->name('bien_locations.store');
    Route::get('/bien_locations/{id_pro}/{id}/edit', [BienLocationController::class, 'edit'])->name('bien_locations.edit');
    Route::post('/bien_locations/{id_pro}/{id}', [BienLocationController::class, 'update'])->name('bien_locations.update');
    Route::delete('/bien_locations/{id_pro}/{id}', [BienLocationController::class, 'destroy'])->name('bien_locations.destroy');

    // Routes de vue
Route::view('/prop-auth/index2', 'prop-auth/index2')->name('prop-auth/index2');
Route::get('/prop-auth/property-grid2', [UtilisateurController::class, 'propertyGrid2'])->name('prop-auth/property-grid2');
Route::get('/agree/{id_pro}', [UtilisateurController::class, 'agree'])->name('agree');
Route::view('/prop-auth/about2', 'prop-auth/about2')->name('prop-auth/about2');
Route::view('/property-single', 'property-single')->name('property-single');
Route::get('/prop-auth/contact2', [ProprietaireController::class, 'showContact'])->name('prop-auth.contact2');

    // Routes pour accord (agree)
    
    Route::get('/agree/{id_pro}', [BienVenteController::class, 'agree'])->name('agree');
    Route::get('/agree/{id_pro}', [BienLocationController::class, 'agree'])->name('agree');

    Route::get('/formBienVente/{id_pro}', function($id_pro){
        return view('formBienVente', compact('id_pro'));
    })->name('formBienVente');
    
    Route::get('/formBienLocation/{id_pro}', function($id_pro){
        return view('formBienLocation', compact('id_pro'));
    })->name('formBienLocation');


    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}/reply', [MessageController::class, 'replyForm'])->name('messages.replyForm');
    Route::post('messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply');
    
});

Route::get('/recherche-biens', [BienRechercheController::class, 'search'])->name('biens.search');


