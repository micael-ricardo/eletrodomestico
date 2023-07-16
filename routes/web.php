<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('cadastro');
});

// Route::get('/datatable', [DataTableLocal::class, 'datatable'])->name('datatable');

// Route::view('/cadastrar-eletrodomestico', 'cadastro');
