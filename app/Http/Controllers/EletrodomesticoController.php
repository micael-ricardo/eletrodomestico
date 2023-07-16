<?php

namespace App\Http\Controllers;

use App\Models\eletrodomesticos;
use Illuminate\Http\Request;

class EletrodomesticoController extends Controller
{
    public function index()
    {
        return eletrodomesticos::with('marca')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'tensao' => 'required',
            'marca_id' => 'required|exists:marcas,id'
        ]);

        $eletrodomesticos = eletrodomesticos::create($request->all());

        return response()->json($eletrodomesticos, 201);
    }

    public function show(eletrodomesticos $eletrodomesticos)
    {
        return $eletrodomesticos;
    }

    public function update(Request $request, eletrodomesticos $eletrodomesticos)
    {
        $request->validate([
            'nome' => 'sometimes|required',
            'descricao' => 'sometimes|required',
            'tensao' => 'sometimes|required',
            'marca_id' => 'sometimes|required|exists:marcas,id'
        ]);

        $eletrodomesticos->update($request->all());

        return response()->json($eletrodomesticos);
    }

    public function destroy(eletrodomesticos $eletrodomesticos)
    {
        $eletrodomesticos->delete();

        return response()->json(null, 204);
    }
}


