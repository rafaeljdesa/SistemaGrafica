    {{ csrf_field() }}
              
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{isset($material->nome) ? $material->nome : ''}}">
    </div>
    <div class="form-group">
        <label for="produto">Produto(id)</label>       
        <select class="form-control" id="produto_id" name="produto_id">
            @foreach($produtos as $produto)    
                <option {{isset($material->produto_id) && ($material->produto_id == $produto->id) ? 'selected' : '' }} value="{{$produto->id}}" >{{$produto->id}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="preco">Preço</label>
        <input type="text" class="form-control" id="preco" name="preco" value="{{isset($material->preco) ? $material->preco : ''}}">
    </div>