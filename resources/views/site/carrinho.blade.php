@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')
    <div class="row container">
        @if ($mensagem = Session::get('sucesso'))
        <div class="card green">
            <div class="card-content white-text">
              <span class="card-title">Sucesso</span>
              <p>{{$mensagem}}</p>
            </div>
        </div>
        @endif

        @if ($mensagem = Session::get('erro'))
        <div class="card red">
            <div class="card-content white-text">
              <span class="card-title">Erro</span>
              <p>{{$mensagem}}</p>
            </div>
        </div>
        @endif
        
        @if($itens->count() == 0)
        <div class="card red">
            <div class="card-content white-text">
                <p>Você não possuir nenhum produto no carrinho.</p>
            </div>
        </div>
        @else
        <h3>Carrinho: </h3>
        <table class="striped">
            <thead>
              <tr>
                  <th></th>
                  <th>Nome</th>
                  <th>Preço</th>
                  <th>Qnt</th>
                  <th></th>
              </tr>
            </thead>
    
            <tbody>
                @foreach ($itens as $item)  
                <tr>
                    <td><img src="{{$item->options->image}}" width="70" class="responsive-img circle"></td>
                    <td>{{$item->name}}</td>
                    <td>R$ {{ number_format( $item->price, 2, ',', '.' ) }}</td>
                    <form action="{{ route('site.atualizacarrinho') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->rowId }}">
                        <td><input type="number" style="width: 40px" class="center" name="qty" value="{{ $item->qty }}"></td>
                        <td>
                            <button type="submit" class="btn-floating waves-effect waves-light orange">
                                <i class="material-icons">refresh</i>
                            </button>
                        </td>
                    </form>
                    <form action="{{ route('site.removecarrinho') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->rowId }}">
                        <td>
                            <button type="submit" class="btn-floating waves-effect waves-light red">
                                <i class="material-icons">delete</i>
                            </button>
                        </td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card orange">
            <div class="card-content white-text">
                <span class="card-title" style="font-weight: 600">TOTAL: R${{ number_format( (float)Cart::subtotal(), 2, ',', '.' ) }}</span>
                <p>Pague em 12x sem juros!</p>
            </div>
        </div>

        @endif
    </div>

    <div class="row container center">
        <a href="{{route('site.index')}}" class="btn waves-effect waves-light blue">
            <span class="left">Continuar comprando</span>
            <i class="material-icons right">arrow_back</i>
        </a>
        
        <a href="{{route('site.limpacarrinho')}}" class="btn waves-effect waves-light red">
            <span class="left">Limpar carrinho</span>
            <i class="material-icons right">clear</i>
        </a>
        
        <button class="btn waves-effect waves-light green">
            <span class="left">Finalizar compra</span>
            <i class="material-icons right">check</i>
        </button>
        
    </div>
@endsection
