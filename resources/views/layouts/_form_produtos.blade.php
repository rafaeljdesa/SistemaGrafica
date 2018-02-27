    {{ csrf_field() }}
              
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{isset($produto->nome) ? $produto->nome : ''}}">
    </div>
    <!-- <div class="form-group">
        <label for="vias">Vias</label>
        <input type="text" class="form-control" id="vias" name="vias" value="{{isset($produto->vias) ? $produto->vias : ''}}">
    </div>
    <div class="form-group">
        <label for="tamanho">Tamanho</label>
        <input type="text" class="form-control" id="tamanho" name="tamanho" value="{{isset($produto->tamanho) ? $produto->tamanho : ''}}">
    </div> -->
    <div class="form-group">
        <label for="preco">Preço</label>
        <input type="text" class="form-control" id="preco" name="preco" value="{{isset($produto->preco) ? $produto->preco : ''}}">
    </div>
    