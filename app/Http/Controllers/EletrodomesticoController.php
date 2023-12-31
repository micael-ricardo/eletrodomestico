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
        try {
            $request->validate([
                'nome' => 'required',
                'descricao' => 'required',
                'tensao' => 'required',
                'marca_id' => 'required|exists:marcas,id'
            ]);
            $eletrodomesticos = eletrodomesticos::create($request->all());
            return response()->json($eletrodomesticos, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao cadastrar o eletrodoméstico'], 500);
        }
    }

    public function show($id)
    {
        $eletrodomestico = eletrodomesticos::findOrFail($id);
        return response()->json($eletrodomestico);
    }
    public function edit(string $id)
    {
        $eletrodomesticos = eletrodomesticos::findOrFail($id);
        return view('cadastro', compact('eletrodomesticos'));
    }
    public function update(Request $request, $id)
    {
        try {
        $validatedData = $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'tensao' => 'required',
            'marca_id' => 'required|exists:marcas,id',
        ]);
            $eletrodomestico = eletrodomesticos::findOrFail($id);
            $eletrodomestico->nome = $validatedData['nome'];
            $eletrodomestico->descricao = $validatedData['descricao'];
            $eletrodomestico->tensao = $validatedData['tensao'];
            $eletrodomestico->marca_id = $validatedData['marca_id'];
            $eletrodomestico->save();

            return response()->json(['message' => 'Eletrodoméstico atualizado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar o eletrodoméstico'], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $eletrodomesticos = eletrodomesticos::findOrFail($id);
            $eletrodomesticos->delete();
            return response()->json(['message' => 'Eletrodoméstico removido com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao deletar o eletrodoméstico'], 500);
        }
    }
}
