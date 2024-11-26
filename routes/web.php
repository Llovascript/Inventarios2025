<?php

use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/opcgenerales', function () {
    return view('layouts.opcgenerales'); 
})->name('opcgenerales');

Route::get('/opcedificios', function () {
    return view('layouts.opcedificios'); 
})->name('opcedificios');

Route::get('/opcestante', function () {
    return view('layouts.opcestante'); 
})->name('opcestantes');


Route::get('/opcusuariosp', function () {
    return view('layouts.opcusuariosp'); 
})->name('opcusuariosp');

Route::get('/opctipodebien', function () {
    return view('layouts.opctipodebien'); 
})->name('opctipodebien');

Route::get('/opcproveedores', function () {
    return view('layouts.opcproveedores'); 
})->name('opcproveedores');

Route::get('/opcfacturas', function () {
    return view('layouts.opcfacturas'); 
})->name('opcfacturas');


Route::get('/opctiposdeactivos', function () {
    return view('layouts.opctiposdeactivos'); 
})->name('opctiposdeactivos');


Route::get('/opcplantas', function () {
    return view('layouts.opcplantas'); 
})->name('opcplantas');


Route::get('/opccharolas', function () {
    return view('layouts.opccharolas'); 
})->name('opccharolas');

Route::get('/opcentradasysalidas', function () {
    return view('layouts.opcentradasysalidas'); 
})->name('opcentradasysalidas');

Route::get('/opcbienes', function () {
    return view('layouts.opcbienes'); 
})->name('opcbienes');


Route::get('/opcespacios', function () {
    return view('layouts.opcespacios'); 
})->name('opcespacios');

Route::get('/opcmateriales', function () {
    return view('layouts.opcmateriales'); 
})->name('opcmateriales');

Route::get('/opcreporte', function () {
    return view('layouts.opcreporte'); 
})->name('opcreporte');

Route::get('/opceditarbienespt', function () {
    return view('layouts.opceditarbienespt'); 
})->name('opceditarbienespt');


Route::get('/opcubicaciones', function () {
    return view('layouts.opcubicaciones'); 
})->name('opcubicaciones');

Route::get('/opcunidades', function () {
    return view('layouts.opcunidades'); 
})->name('opcunidades');

Route::get('/opcbienesporu', function () {
    return view('layouts.opcbienesporu'); 
})->name('opcbienesporu');





require __DIR__.'/auth.php';
