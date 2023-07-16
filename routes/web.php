<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('cadastro');
});

Route::view('/cadastrar-eletrodomestico', 'cadastro');
