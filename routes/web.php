<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RumahController;

Route::get('/rumah', [RumahController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
