<div class="form-group">
    <label for="cliente">Cliente</label>       
    <select class="form-control" id="cliente" name="cliente">
        @foreach($clientes as $cliente)    
            <option {{isset($cliente->nome) && ($cliente->nome == $cliente->nome) ? 'selected' : '' }} value="{{$cliente->nome}}" >{{$cliente->nome}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label for="">Produtos</label>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target=".modal-produtos"><img src="{{asset('icons/add.png')}}" alt="Adicionar">Adicionar produto</button>
            </div>
            
            @include('layouts._modal_produtos')

            <table class="table table-orcamento">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Vias</th>
                        <th scope="col">Tamanho</th>
                        <th scope="col">Preço(R$)</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($produtoLancar)    
                        @foreach($produtoLancar as $produtoLancado)
                        <tr>                     
                            <td>{{$produtoLancado->id}}</td>
                            <td>{{$produtoLancado->nome}}</td>
                            <td>{{$produtoLancado->vias}}</td>
                            <td>{{$produtoLancado->tamanho}}</td>
                            <td>{{number_format($produtoLancado->preco, 3, ',', '.')}}</td>
                        </tr>
                        @endforeach
                    @endisset        
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <label for=""> Materiais</label>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target=".modal-materiais"><img src="{{asset('icons/add.png')}}" alt="Adicionar">Adicionar material</button>
            </div>
            
            @include('layouts._modal_materiais')

            <table class="table table-orcamento">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Produto(id)</th>
                        <th scope="col">Preço(R$)</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($materialLancar)    
                        @foreach($materialLancar as $materialLancado)
                        <tr>                     
                            <td>{{$materialLancado->id}}</td>    
                            <td>{{$materialLancado->nome}}</td>    
                            <td>{{$materialLancado->produto_id}}</td>                            
                            <td>{{number_format($materialLancado->preco, 3, ',', '.')}}</td>
                        </tr>
                        @endforeach    
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="observacao">Observação</label>
    <textarea class="form-control" id="observacao" rows="3"></textarea>
</div>

<div class="form-group">
    <div class="row justify-content-end">
        <div class="col-2">        
            <div id="valor-total" class="total bg-primary p-2 m-2 rounded text-light">
                <spam>Total: R$</spam>
            </div>
        </div>    
    </div>
</div>