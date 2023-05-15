<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();

        return response()->json($produtos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = new Produto;
        $produto->categoria_id = $request->input('categoria_id');
        $produto->codigo = $request->input('codigo');
        $produto->nome = $request->input('nome');
        $produto->preco = $request->input('preco');
        $produto->preco_promocional = $request->input('preco_promocional');
        $produto->ativo = $request->input('ativo', true);
        $produto->save();

        return response()->json($produto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado']);
        }
        
        return response()->json($produto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message'=>'Produto não encontrado'], 404);
        }
        $produto->categoria_id = $request->input('categoria_id');
        $produto->codigo = $request->input('codigo');
        $produto->nome = $request->input('nome');
        $produto->preco = $request->input('preco');
        $produto->preco_promocional = $request->input('preco_promocional');
        $produto->ativo = $request->input('ativo', true);
        $produto->save();

        return response()->json($produto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado']);
        }
        
        $produto->delete();

        return response()->json(['message'=> 'Produto excluido com sucesso']);
    }
}
