<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;
use App\Models\eletrodomesticos;


class DatatableEletrodomestico extends Controller
{
    public function datatable(Request $request)
    {

        // dd($request);
        $eletrodomesticos = eletrodomesticos::query();

        if ($request->has('nome') && $request->input('nome') !== null) {
            $eletrodomesticos->where('nome', 'like', '%' . $request->input('nome') . '%');
        }
        if ($request->has('tensao') && $request->input('tensao') !== null) {
            $eletrodomesticos->where('tensao','=', $request->input('tensao'));
        }
        if ($request->has('descricao') && $request->input('descricao') !== null) {
            $eletrodomesticos->where('descricao', 'like', '%' . $request->input('descricao') . '%');
        }

        return DataTables::of($eletrodomesticos)->toJson();
    }

}
