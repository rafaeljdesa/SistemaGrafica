{{ csrf_field() }}
              
<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{isset($servico->nome) ? $servico->nome : ''}}">
</div>
<div class="form-group">
    <label for="preco">Preço</label>
    <input type="text" class="form-control" id="preco" name="preco" value="{{isset($servico->preco) ? $servico->preco : ''}}">
</div>
              