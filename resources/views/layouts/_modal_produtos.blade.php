<div class="modal fade modal-produtos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-produto-titulo">Adicionar produto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Vias</th>
                    <th scope="col">Tamanho</th>
                    <th scope="col">Preço(R$)</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr>                      
                        <td>{{$produto->id}}</td>    
                        <td>{{$produto->nome}}</td>    
                        <td>{{$produto->vias}}</td>    
                        <td>{{$produto->tamanho}}</td>    
                        <td>{{number_format($produto->preco, 3, ',', '.')}}</td>    
                        <td>
                            <a class="btn btn-success" href="{{route('lancar.produto', $produto->id)}}"><img src="{{asset('icons/add.png')}}" alt="Adicionar"></a>
                        </td>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    </div>
  </div>
</div>