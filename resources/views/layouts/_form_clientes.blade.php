        {{ csrf_field() }}
              
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{isset($cliente->nome) ? $cliente->nome : ''}}">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="{{isset($cliente->telefone) ? $cliente->telefone : ''}}">
        </div>
        <div class="form-group">
            <label for="telefone">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{isset($cliente->email) ? $cliente->email : ''}}">
        </div>