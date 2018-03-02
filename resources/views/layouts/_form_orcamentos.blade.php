<div class="form-group">
    <label for="cliente">Cliente</label>       
    <select class="form-control" id="cliente" name="cliente_id">
            <option value="Selecione o cliente" selected >Selecione o cliente</option>
        @foreach($clientes as $cliente)    
            <option {{isset($cliente->id) ? '' : '' }} value="{{$cliente->id}}" >{{$cliente->nome}}</option>
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

            <div class="table-orcamento">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="table-primary text-center">
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <!-- <th scope="col">Vias</th>
                            <th scope="col">Tamanho</th> -->
                            <th scope="col">Preço(R$)</th>
                            <th scope="col">QTD</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($produtoLancar)    
                            @foreach($produtoLancar as $produtoLancado)
                            <tr>                     
                                <td>{{$produtoLancado['id']}}</td>
                                <td>{{$produtoLancado['nome']}}</td>
                                <td>{{number_format($produtoLancado['preco'], 3, ',', '.')}}</td>
                                <!-- <td><input type="text" class="produto-quantidade" value="{{$produtoLancado['quantidade']}}"></td> -->
                                <td>{{$produtoLancado['quantidade']}}</td>
                                <td><a class="" href="{{route('deletar.produto', $produtoLancado['id'])}}"><img src="{{asset('icons/delete.png')}}" alt="Deletar"></a></td>
                            </tr> 
                            @endforeach
                        @endisset         
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-6">
            <label for=""> Materiais</label>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target=".modal-materiais"><img src="{{asset('icons/add.png')}}" alt="Adicionar">Adicionar servico</button>
            </div>
            
            @include('layouts._modal_materiais')
            <div class="table-orcamento">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="table-primary text-center">
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Produto(id)</th>
                            <th scope="col">Preço(R$)</th>
                            <th scope="col">QTD</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($materialLancar)    
                            @foreach($materialLancar as $materialLancado)
                            <tr>                     
                                <td>{{$materialLancado['id']}}</td>    
                                <td>{{$materialLancado['nome']}}</td>    
                                <td>{{$materialLancado['produto_id']}}</td>                            
                                <td>{{number_format($materialLancado['preco'], 3, ',', '.')}}</td>
                                <!-- <td><input type="text" class="produto-quantidade" value="{{$materialLancado['quantidade']}}"></td> -->
                                <td>{{$materialLancado['quantidade']}}</td>
                                <td><a class="" href="{{route('deletar.material', $materialLancado['id'])}}"><img src="{{asset('icons/delete.png')}}" alt="Deletar"></a></td>
                            </tr>
                            @endforeach    
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
    <div class="row mt-2">
        <div class="col-12">
            <label for=""> Servicos</label>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target=".modal-servicos"><img src="{{asset('icons/add.png')}}" alt="Adicionar">Adicionar servico</button>
            </div>
        
            @include('layouts._modal_servicos')
            <div class="table-orcamento">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="table-primary text-center">
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Preço(R$)</th>
                            <th scope="col">QTD</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($servicoLancar)    
                            @foreach($servicoLancar as $servicoLancado)
                            <tr>                     
                                <td>{{$servicoLancado['id']}}</td>    
                                <td>{{$servicoLancado['nome']}}</td>                           
                                <td>{{number_format($servicoLancado['preco'], 3, ',', '.')}}</td>
                                <td>{{$servicoLancado['quantidade']}}</td>
                                <td><a class="" href="{{route('deletar.servico', $servicoLancado['id'])}}"><img src="{{asset('icons/delete.png')}}" alt="Deletar"></a></td>
                            </tr>
                            @endforeach    
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    

<div class="form-group">
    <label for="observacao">Observação</label>
    <textarea class="form-control" id="observacao" rows="3" name="observacao"></textarea>
</div>

<div class="form-group">
    <div class="row justify-content-end">
        <div class="col-2">        
            <div class="total bg-primary p-2 m-2 rounded text-light">
                <spam id="valor-total">Total: R${{isset($totalProdutos) || isset($totalMateriais) || isset($totalServicos) ? number_format($totalProdutos + $totalMateriais + $totalServicos, 2, ',','.') : '0,00'}}</spam>
                <input type="hidden" value="{{isset($totalProdutos) || isset($totalMateriais) || isset($totalServicos) ? ($totalProdutos + $totalMateriais + $totalServicos) : 0}}" name="valor_total">
            </div>
        </div>    
    </div>
</div>
