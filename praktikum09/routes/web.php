<?php
namespace App\Http\Controllers;

use App\Http\Controllers\PasienControllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kabar', function () {
    return view('kondisi');
});

Route::get('/nilai', function () {
    return view('nilai');
});

Route::get('/pasien', function () {
    return view('pasien');
});

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/pasien', [PasienController::class, 'index']);

