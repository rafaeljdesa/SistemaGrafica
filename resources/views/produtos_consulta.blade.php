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
                <th scope="col">Preço(R$)</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>               
                    
                    <td>{{$produto->id}}</td>    
                    <td>{{$produto->nome}}</td>        
                    <td>{{number_format($produto->preco, 3, ',', '.')}}</td>    
                    <td>
                        <a class="mr-2" href="{{route('produtos.editar', $produto->id)}}"><img src="{{asset('icons/edit.png')}}" alt="Editar"></a>
                        <a class="" href="javascript: if(confirm('Deseja deletar este produto?')){ window.location.href = '{{route('produtos.deletar', $produto->id)}}' } "><img src="{{asset('icons/delete.png')}}" alt="Deletar"></a>
                        
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>

@endsection