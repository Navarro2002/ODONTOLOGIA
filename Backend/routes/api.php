<?php

use App\Http\Controllers\Api\CitasController;
use App\Http\Controllers\Api\DoctoresController;
use App\Http\Controllers\Api\PacientesController;
use App\Models\MntCitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('pacientes')->group(function () {
    Route::get('/', [PacientesController::class, 'index']);
    Route::post('crear', [PacientesController::class, 'store']);
    Route::put('editar/{id}', [PacientesController::class, 'update']);
    Route::put('cambio-estado/{id}', [PacientesController::class, 'cambiarEstado']);
});

Route::prefix('doctores')->group(function () {
    Route::get('/', [DoctoresController::class, 'index']);
    Route::post('crear', [DoctoresController::class, 'store']);
    Route::put('editar/{id}', [DoctoresController::class, 'update']);
    Route::put('cambio-estado/{id}', [DoctoresController::class, 'cambiarEstado']);
});

Route::prefix('citas')->group(function () {
    Route::get('/', [CitasController::class, 'index']);
    Route::post('crear', [CitasController::class, 'store']);
    Route::put('editar/{id}', [CitasController::class, 'update']);
    Route::put('cambio-estado/{id}', [CitasController::class, 'cambiarEstado']);
});
