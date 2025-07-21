<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // CRUD Karyawan
    Route::get('/karyawan', [KaryawanController::class, 'index']);
    Route::get('/karyawan/{id}', [KaryawanController::class, 'show']);
    Route::post('/karyawan/add', [AuthController::class, 'register']);
    Route::patch('/karyawan/{id}', [KaryawanController::class, 'update']);
    Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);

    // CRUD Barang
    Route::get('/barang', [BarangController::class, 'index']);
    Route::post('/barang/add', [BarangController::class, 'store']);
    Route::get('/barang/{id}', [BarangController::class, 'show']);
    Route::put('/barang/{id}', [BarangController::class, 'update']);
    Route::delete('/barang/{id}', [BarangController::class, 'destroy']);

    // CRUD Supplier
    Route::get('/supplier', [SupplierController::class, 'index']);
    Route::post('/supplier/add', [SupplierController::class, 'store']);
    Route::get('/supplier/{id}', [SupplierController::class, 'show']);
    Route::put('/supplier/{id}', [SupplierController::class, 'update']);
    Route::delete('/supplier/{id}', [SupplierController::class, 'destroy']);

    // CRUD Satuan
    Route::get('/satuan', [SatuanController::class, 'index']);
    Route::post('/satuan/add', [SatuanController::class, 'store']);
    Route::get('/satuan/{id}', [SatuanController::class, 'show']);
    Route::put('/satuan/{id}', [SatuanController::class, 'update']);
    Route::delete('/satuan/{id}', [SatuanController::class, 'destroy']);
});
