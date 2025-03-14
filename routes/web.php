<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomRegisterController;
use App\Http\Controllers\UbicacionController;

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
    return view('custom-dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de registro protegidas para solo super admin
Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/custom-register', [CustomRegisterController::class, 'showRegistrationForm'])->name('custom.register.form');
    Route::post('/custom-register', [CustomRegisterController::class, 'register'])->name('custom.register');
});

// Ruta para Ubicaciones
// Resource routes for Ubicacion
Route::resource('ubicaciones', UbicacionController::class);

// API routes for dynamic dropdowns
Route::get('/api/plantas-by-edificio', [UbicacionController::class, 'getPlantasByEdificio']);
Route::get('/api/areas-by-planta', [UbicacionController::class, 'getAreasByPlanta']);

// Rutas de facturas y registros super admin


require __DIR__.'/auth.php';
