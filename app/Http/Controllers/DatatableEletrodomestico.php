<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;
use App\Models\eletrodomesticos;


class DatatableEletrodomestico extends Controller
{
    public function datatable(Request $request)
    {
        $eletrodomesticos = eletrodomesticos::all();

        return Datatables::of($eletrodomesticos)->make(true);
      
    }
}
