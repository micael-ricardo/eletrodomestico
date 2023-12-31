<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;
use App\Models\eletrodomesticos;


class DatatableEletrodomestico extends Controller
{
    public function datatable(Request $request)
    {

        $eletrodomesticos = eletrodomesticos::with('marca');

        if ($request->has('nome') && $request->input('nome') !== null) {
            $eletrodomesticos->where('nome', 'like', '%' . $request->input('nome') . '%');
        }
        if ($request->has('tensao') && $request->input('tensao') !== null) {
            $eletrodomesticos->where('tensao','=', $request->input('tensao'));
        }
        if ($request->has('descricao') && $request->input('descricao') !== null) {
            $eletrodomesticos->where('descricao', 'like', '%' . $request->input('descricao') . '%');
        }
        if ($request->has('marca_id') && $request->input('marca_id') !== null) {
            $eletrodomesticos->where('marca_id', $request->input('marca_id'));
        }

        if ($request->has('data_inicio') && $request->input('data_inicio') !== null) {
            $eletrodomesticos->where('created_at', '>=', $request->input('data_inicio'));
        }

        if ($request->has('data_fim') && $request->input('data_fim') !== null) {
            $eletrodomesticos->where('created_at', '<=', $request->input('data_fim'));
        }

        return DataTables::of($eletrodomesticos)->toJson();
    }

}
