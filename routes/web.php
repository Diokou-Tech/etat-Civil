<?php

use App\Http\Controllers\DecController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Team;
use App\Models\Enfant;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\PDF;
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

Route::get('/', function (Request $req) {
    return view('welcome');
});
Route::get('/apropos', function () {
    return view('pages.apropos');
});
Route::get('/guide', function () {
    return view('pages.guide');
});
//renvoyer un composant

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
//route apres l'authentifcation de l'utilisateur

Route::get('team', function () {
    dd(Team::find(1));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/tableauBord', function () {
    return view('tableauBord',['enfants' => Enfant::all()]);
})->name('tableauBord');
Route::middleware(['auth:sanctum', 'verified'])->get('/declaration', [DecController::class,'index'])->name('declaration');
Route::middleware(['auth:sanctum', 'verified'])->post('/declaration', [DecController::class,'store'])->name('declaration');
Route::middleware(['auth:sanctum', 'verified'])->get('/delete/{id}', [DecController::class,'destroy'])->name('delete');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [DecController::class,'edit'])->name('edit');
Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [DecController::class,'show'])->name('show');
Route::middleware(['auth:sanctum', 'verified'])->post('/update/{id}', [DecController::class,'update'])->name('update');
Route::middleware(['auth:sanctum', 'verified'])->get('/print/{id}', [DecController::class,'print'])->name('print');
Route::middleware(['auth:sanctum', 'verified'])->match(['get', 'post'],'/search', [DecController::class,'search'])->name('search');
