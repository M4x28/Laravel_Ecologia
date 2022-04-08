<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RifiutiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Ajax;
use App\Models\Comuni_aderenti;
use App\Http\Controllers\HomeController;
use App\http\Controllers\ComuneController;
use Illuminate\Support\Facades\App;

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
Auth::routes(['verify' => true]);


// Home profilo
Route::get('/home', [HomeController::class, 'create']);
//Route::post('/home', [HomeController::class, 'store'])->name('home.store');
Route::resource('home', HomeController::class)->middleware('verified');


// Lingua
//https://5balloons.info/localization-laravel-multi-language-language-switcher/
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguageController@switchLang']);


// ------------------ **** ---------------------
Route::get('/', [RifiutiController::class, 'index'])->name('index');
Route::post('index', [RifiutiController::class, 'getCestino'])->name('index.getCestino');

Route::resource('comune', ComuneController::class);

//Ajax ELOQUENT 
Route::post('/getRifiuti', [Ajax::class, 'get_rifiuti'])->name('getRifiuti');
Route::post('/getCCR', [Ajax::class, 'getCCR'])->name('getCCR');
Route::post('/getComuni', [Ajax::class, 'getComuni'])->name('getComuni');
Route::post('/getComuniAderenti', [Ajax::class, 'getComuniAderenti'])->name('getComuniAderenti');
