<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(5);
        $categorias = Categoria::all();
        return view('admin.produtos', compact('produtos', 'categorias'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $produto = $request->all();
        if($request->imagem){
            $produto['imagem'] = $request->imagem->store('produtos');
        }
        $produto['slug'] = Str::slug($request->nome);
        $produto = Produto::create($produto);

        return redirect()->route('admin.produtos')->with('sucesso', 'produto criado com sucesso!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('admin.produtos')->with('sucesso', 'Produto removido com sucesso!');
    }
}
