<?php

use App\Http\Controllers\DatatableEletrodomestico;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EletrodomesticoController;


Route::get('/', function () {
    return view('listar');
});

Route::get('/datatable', [DatatableEletrodomestico::class, 'datatable'])->name('datatable');

Route::view('/listar', 'listar');
Route::view('/cadastro', 'cadastro')->name('cadastro');
Route::get('/eletrodomestico/{id}/editar', [EletrodomesticoController::class, 'edit'])->name('eletrodomesticos.editar');
