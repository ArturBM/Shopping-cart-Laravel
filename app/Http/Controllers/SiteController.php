<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(3);
        return view('site.home', compact('produtos'));
    }

    public function details($slug){
        $produto = Produto::where('slug', $slug)->first();
        Gate::authorize('ver-produto', $produto);
        return view('site.details', compact('produto'));
    }

    public function categoria($id){
        $categoria = Categoria::find($id);
        $produtos = Produto::where('id_categoria', $id)->paginate(3);
        return view('site.categoria', compact('produtos', 'categoria'));
    }
}
