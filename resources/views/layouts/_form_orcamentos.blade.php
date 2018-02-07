<div class="form-group">
    <label for="cliente">Cliente</label>       
    <select class="form-control" id="cliente" name="cliente">
        @foreach($clientes as $cliente)    
            <option {{isset($cliente->nome) && ($cliente->nome == $cliente->nome) ? 'selected' : '' }} value="{{$cliente->nome}}" >{{$cliente->nome}}</option>
        @endforeach
    </select>
</div>