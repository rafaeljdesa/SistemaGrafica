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
                <th scope="col">Ação</th>
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
                        <a class="btn btn-warning mr-2" href="{{route('materiais.editar', $material->id)}}">Editar</button>
                        <a class="btn btn-danger deletar" href="javascript: if(confirm('Deseja deletar este material?')){ window.location.href = '{{route('materiais.deletar', $material->id)}}' } ">Deletar</button>
                        
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>

@endsection