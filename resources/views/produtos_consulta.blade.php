@extends('layouts._home')
@section('content')


    @if(session('status'))
        <div class="alert alert-success mt-2 text-center">
            {{ session('status') }}
        </div>
    @endif

    <h3 class="text-center">Consulta de produtos</h3>

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
                        <a class="btn btn-warning mr-2" href="{{route('produtos.editar', $produto->id)}}">Editar</button>
                        <a class="btn btn-danger deletar" href="javascript: if(confirm('Deseja deletar este produto?')){ window.location.href = '{{route('produtos.deletar', $produto->id)}}' } ">Deletar</button>
                        
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>

@endsection