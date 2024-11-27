<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CarrinhoController extends Controller
{
    public function carrinhoLista() {
        $itens = Cart::content();
       return view('site/carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request) {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qnt,
            'options' => array([
                'image' => $request->img
            ])
        ]);
    }
}
