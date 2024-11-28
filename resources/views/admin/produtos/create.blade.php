<div id="create" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">card_giftcard</i> Novo produto</h4>
        <form action="{{route('admin.produto.create')}}" method="POST" enctype="multipart/form-data" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input id="nome" type="text" class="validate">
                    <label for="nome">Nome:</label>
                </div>
                <div class="input-field col s6">
                    <input id="preco" type="number" class="validate">
                    <label for="preco">Preço: </label>
                </div>
                <div class="input-field col s12">
                    <input id="descricao" type="text" class="validate">
                    <label for="descricao">Descrição: </label>
                </div>
                <div class="input-field col s12">
                    <select>
                        <option value="" disabled selected>Opções:</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$produto->categoria->id}}">{{$produto->categoria->nome}}</option>
                        @endforeach
                    </select>
                    <label>Categoria</label>
                </div>
            </div>
            <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cadastrar</a><br>
    </div>
    </form>
</div>