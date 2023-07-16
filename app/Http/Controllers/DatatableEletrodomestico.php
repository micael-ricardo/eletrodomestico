<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;
use App\Models\eletrodomesticos;


class DatatableEletrodomestico extends Controller
{
    public function datatable(Request $request)
    {
        $eletrodomesticos = eletrodomesticos::query();

        if ($request->has('nome') && $request->input('nome') !== null) {
            $eletrodomesticos->where('nome', 'like', '%' . $request->input('nome') . '%');
        }
        

        return DataTables::of($eletrodomesticos)->toJson();
    }

}
