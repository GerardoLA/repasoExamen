<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MunicipiosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/formInsertar', function () {
    return view('formInsertar');
})->name('formInsertar');

Route::post('/formInsertar', [MunicipiosController::class,'store'])->name('formInsertar');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/municipios', [MunicipiosController::class, 'index'])->name('municipios');
Route::delete('/municipios/{municipio}', [MunicipiosController::class, 'destroy'])->name('municipios.eliminar');
Route::get('/municipios/{municipio}', [MunicipiosController::class, 'edit'])->name('municipios.update');


//Route::get('/modificarMunicipioFormulario'/{id}, [MunicipiosController::class,''])->name('formInsertar');





require __DIR__.'/auth.php';
