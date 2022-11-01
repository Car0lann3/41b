<?php

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// pour tester les regexp: https://regex101.com/
$langValidator = '^(fr|en)$';

Route::get('/{lang}/vols', function ($lang) { // Controller + Route
    App::setLocale($lang);

    $allFlights = Flight::findAll();          // Model

    // quelque chose a faire...
    return 'sasa';
})->where('lang', $langValidator);            // Controller + Route

Route::get('/{lang}/vol/{nom}', function ($lang, $nom) { // Controller + Route
    App::setLocale($lang);

    $flight = Flight::findOne($nom);          // Model

    if (!$flight) {                           // Validation du Model
        abort(404);                           // Controller
    }

    return '';
})->where('lang', $langValidator);            // Controller + Route
