<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RifiutiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\getRifiuti;

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

// Auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Lingua
Route::get('lang/{locale}', function ($locale = 'en') {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
    }

    //return view('index')->with('smistamento', null);
    return View::make('index', ['smistamento' => null]);
});


// ------------------ **** ---------------------
Route::get('/', [RifiutiController::class, 'index'])->name('index');
Route::post('index', [RifiutiController::class, 'getCestino'])->name('index.getCestino');

//Route::resource('index', RifiutiController::class);

//Ajax
/*
Route::post('/getRifiuti', function () {
    
    $rifiuti = DB::table('RIFIUTI')->get();
    return response()->json($rifiuti);
})->name('getRifiuti');
*/
// ELOQUENT 
Route::post('/getRifiuti', [getRifiuti::class, 'getRifiuti'])->name('getRifiuti');
