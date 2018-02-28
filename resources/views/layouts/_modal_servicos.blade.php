<div class="modal fade modal-servicos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-produto-titulo">Adicionar servico</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço(R$)</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicos as $servico)
                    <tr>                      
                        <td>{{$servico->id}}</td>    
                        <td>{{$servico->nome}}</td>     
                        <td>{{number_format($servico->preco, 3, ',', '.')}}</td>    
                        <td>
                            <a class="btn btn-success" href="{{route('lancar.servico', $servico->id)}}"><img src="{{asset('icons/add.png')}}" alt="Adicionar"></a>
                        </td>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    </div>
  </div>
</div>