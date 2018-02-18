<div class="modal fade modal-materiais" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-material-titulo">Adicionar material</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    
        <table class="table">
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
                @foreach($materiais as $material)
                    <tr>               
                        <td>{{$material->id}}</td>    
                        <td>{{$material->nome}}</td>    
                        <td>{{$material->produto_id}}</td>                            
                        <td>{{number_format($material->preco, 3, ',', '.')}}</td>    
                        <td>
                            <a class="btn btn-success"href=""><img src="{{asset('icons/add.png')}}" alt="Adicionar"></a>
                        </td>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    </div>
  </div>
</div>