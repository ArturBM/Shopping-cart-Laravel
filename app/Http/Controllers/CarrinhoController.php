<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function CarrinhoLista()
    {
        $itens = Cart::content();
        return view('site.carrinho', compact('itens'));
    }

    public function AdicionaCarrinho(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qnt,
            'options' => array(
                'image' => $request->img
            )
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado ao carrinho!');
    }

    public function RemoveCarrinho(Request $request)
    {
        Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido do carrinho!');
    }

    public function AtualizaCarrinho(Request $request)
    {
        $rowId = $request->input('id');
        $qty = $request->input('qty');

        if ($qty > 0) {
            Cart::update($rowId, [
                'qty' => $qty
            ]);
            return redirect()->route('site.carrinho')->with('sucesso', 'Carrinho atualizado!');
        } else {
            return redirect()->route('site.carrinho')->with('erro', 'A quantidade deve ser maior que zero.');
        }
    }

    public function LimpaCarrinho(){
        Cart::destroy();
        return redirect()->route('site.carrinho')->with('sucesso', 'Os itens do seu carrinho foram removidos!');
    }
}
