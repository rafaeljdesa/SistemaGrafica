@extends('layouts._home')
@section('content')


    @if(session('status'))
        <div class="alert alert-success mt-2 text-center">
            {{ session('status') }}
        </div>
    @endif

    <h3 class="text-center">Consulta de materiais</h3>

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
                        <a class="mr-2" href="{{route('materiais.editar', $material->id)}}"><img src="{{asset('icons/edit.png')}}" alt="Editar"></a>
                        <a class="" href="javascript: if(confirm('Deseja deletar este material?')){ window.location.href = '{{route('materiais.deletar', $material->id)}}' } "><img src="{{asset('icons/delete.png')}}" alt="Deletar"></a>
                        
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>

@endsection