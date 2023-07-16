<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EletrodomesticoController;
use App\Http\Controllers\MarcaController;

Route::apiResource('eletrodomesticos', EletrodomesticoController::class);
Route::apiResource('marcas', MarcaController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
