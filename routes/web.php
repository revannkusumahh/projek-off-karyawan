<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffKaryawanController;

Route::get('/', [OffKaryawanController::class, 'index']);

Route::post('/simpan', [OffKaryawanController::class, 'store']);

Route::get('/hapus/{id}', [OffKaryawanController::class, 'destroy']);