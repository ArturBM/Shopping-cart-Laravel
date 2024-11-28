@extends('admin.layout')
@section('conteudo')
@section('titulo', 'Produtos')

<div class="fixed-action-btn">
    <a class="btn-floating btn-large bg-gradient-green modal-trigger" href="#create">
        <i class="large material-icons">add</i>
    </a>
</div>

@include('admin.produtos.create')

<div class="row container crud">
    @include('admin.includes.mensagens')
    <div class="row titulo ">
        <h1 class="left">Produtos</h1>
        <span class="right chip">{{$produtos->count()}} produtos exibidos</span>
    </div>
    <nav class="bg-gradient-blue">
        <div class="nav-wrapper">
            <form>
                <div class="input-field">
                    <input placeholder="Pesquisar..." id="search" type="search" required>
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </form>
        </div>
    </nav>
    <div class="card z-depth-4 registros">
        <table class="striped ">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Produto</th>

                    <th>Preço</th>
                    <th>Categoria</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td><img src="{{ $produto->imagem }}" class="circle "></td>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>{{ $produto->categoria->nome }}</td>
                        <td>
                            <a class="btn-floating  waves-effect waves-light orange">
                                <i class="material-icons">mode_edit</i>
                            </a>
                            <a class="btn-floating modal-trigger waves-effect waves-light red" href="#delete-{{$produto->id}}">
                                <i class="material-icons">delete</i>
                            </a>
                            @include('admin.produtos.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row center">
        {{ $produtos->links('custom.pagination') }}
    </div>
</div>

@endsection
