<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RifiutiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Ajax;
use App\Models\Comuni_aderenti;
use App\Http\Controllers\HomeController;
use App\http\Controllers\ComuneController;

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

Route::get('/home', [HomeController::class, 'create']);
//Route::post('/home', [HomeController::class, 'store'])->name('home.store');
Route::resource('home', HomeController::class);


// Lingua
Route::get('lang/{locale}', function ($locale = 'en') {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
    }

    $previous = explode('/', url()->previous());

    if ($previous[count($previous) - 2] == 'public') {
        $comuni = Comuni_aderenti::join('COMUNI_UFF', 'COMUNI_ADERENTI.fk_comune', '=', 'COMUNI_UFF.istat')->get(['COMUNI_UFF.comune']);
        //return view('index')->with('smistamento', null);
        return View::make('index', [
            'smistamento' => null,
            'comuni_aderenti' => $comuni
        ]);
    } else {
        return redirect()->back();
    }
});


// ------------------ **** ---------------------
Route::get('/', [RifiutiController::class, 'index'])->name('index');
Route::post('index', [RifiutiController::class, 'getCestino'])->name('index.getCestino');

Route::resource('comune', ComuneController::class);

//Ajax ELOQUENT 
Route::post('/getRifiuti', [Ajax::class, 'get_rifiuti'])->name('getRifiuti');
Route::post('/getCCR', [Ajax::class, 'getCCR'])->name('getCCR');
Route::post('/getComuni', [Ajax::class, 'getComuni'])->name('getComuni');
Route::post('/getComuniAderenti', [Ajax::class, 'getComuniAderenti'])->name('getComuniAderenti');
