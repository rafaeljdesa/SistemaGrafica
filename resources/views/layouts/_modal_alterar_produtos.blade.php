<div class="modal fade modal-alterar-produtos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-alterar-produto-titulo">Alterar produtos</h5>
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
                    <th scope="col">Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @isset($produtoLancar)    
                    @foreach($produtoLancar as $produtoLancado)
                        <tr>                     
                            <td>{{$produtoLancado['id']}}</td>
                            <td>{{$produtoLancado['nome']}}</td>
                            <td>{{number_format($produtoLancado['preco'], 3, ',', '.')}}</td>
                            <td>
                                <input type="text" class="form-qtd" width="5" value="{{$produtoLancado['quantidade']}}">
                            </td>
                        </tr> 
                    @endforeach
                @endisset    
            </tbody>
        </table>

        <a href="" class="btn btn-success mb-2">Salvar alterações</a>

    </div>
  </div>
</div>