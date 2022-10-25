<?php

use App\Models\Flight;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// pour tester les regexp: https://regex101.com/
$langValidator = '^(fr|en)$';

// Route de redirection
Route::get('/', function () {
    /*
    try {
        throw new Exception('Test ceci est une erreur');
    } catch (Throwable $ex) {
        // ignore
    }
*/
    //throw new InvalidArgumentException('allo');
    //throw new Exception('test');

    return redirect('/fr/accueil');
});

// Route pour l'accueil
Route::get('/{lang}/accueil', function ($lang) {
    // Configurer la bonne langue pour la requête
    App::setLocale($lang);
    // Retourner la vue
    return view('page', [
        'title' => 'Accueil'
    ]);
})->where('lang', $langValidator); // Validation du paramètre de route

// Route pour À propos
Route::get('/{lang}/a-propos', function ($lang) {
    App::setLocale($lang);
    return view('page', [
        'title' => 'À propos'
    ]);
})->where('lang', $langValidator);

// Route pour Équipe
Route::get('/{lang}/equipe', function ($lang) {
    App::setLocale($lang);
    return view('page', [
        'title' => 'Équipe'
    ]);
})->where('lang', $langValidator);

// Route pour contact en GET
Route::get('/{lang}/contact', function ($lang) {
    App::setLocale($lang);
    return view('contact', [
        'message' => null
    ]);
})->where('lang', $langValidator);

// Route pour contact en POST
Route::post('/{lang}/contact', function ($lang) {
    App::setLocale($lang);
    return view('contact', [
        'message' => request('message')
    ]);
})->where('lang', $langValidator);


// Example avec une route qui gère toutes les page
/*Route::get('/{lang}/{action}', function ($lang, $action) {
    App::setLocale($lang);

    return view('page', [
        'title' => $action
    ]);
})->where('lang', $langValidator)->where('action', '^(equipe|a-propos|accueil)$');
*/

// Exemple en meta-programmation
/*
$routes = [
    'equipe', 'a-propos', 'accueil'
];
foreach ($routes as $route) {
    Route::get("/{lang}/$route", function ($lang) use ($route) {
        App::setLocale($lang);
        return view('page', [
            'title' => $route
        ]);
    })->where('lang', $langValidator);
}
*/


Route::get('/{lang}/vols', function ($lang) { // Controller + Route
    App::setLocale($lang);

    $allFlights = Flight::findAll();          // Model

    return view('flights.all', [              // View
        'allFlights' => $allFlights           // View
    ]);                                       // View
})->where('lang', $langValidator);            // Controller + Route

Route::get('/{lang}/vol/{nom}', function ($lang, $nom) { // Controller + Route
    App::setLocale($lang);

    $flight = Flight::findOne($nom);          // Model

    if (!$flight) {                           // Validation du Model
        abort(404);                           // Controller
    }

    return view('flights.one', [              // View
        'flight' => $flight                   // View
    ]);                                       // View
})->where('lang', $langValidator);            // Controller + Route
