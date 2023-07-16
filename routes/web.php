<?php

use App\Http\Controllers\DatatableEletrodomestico;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('listar');
});

Route::get('/datatable', [DatatableEletrodomestico::class, 'datatable'])->name('datatable');

Route::view('/listar', 'listar');
Route::view('/cadastro', 'cadastro')->name('cadastro');

