<?php

namespace App\Http\Controllers;

use App\Models\marcas;

class MarcaController extends Controller
{
    public function index()
    {
        return marcas::all();
    }
}


