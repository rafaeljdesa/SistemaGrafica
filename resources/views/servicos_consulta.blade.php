@extends('layouts._home')
@section('content')


    @if(session('status'))
        <div class="alert alert-success mt-2 text-center">
            {{ session('status') }}
        </div>
    @endif

    <h3 class="text-center">Consulta de servicos</h3>

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
            @foreach($servicos as $servico)
                <tr>               
                    
                    <td>{{$servico->id}}</td>    
                    <td>{{$servico->nome}}</td>        
                    <td>{{number_format($servico->preco, 3, ',', '.')}}</td>    
                    <td>
                        <a class="mr-2" href="{{route('servicos.editar', $servico->id)}}"><img src="{{asset('icons/edit.png')}}" alt="Editar"></a>
                        <a class="" href="javascript: if(confirm('Deseja deletar este servico?')){ window.location.href = '{{route('servicos.deletar', $servico->id)}}' } "><img src="{{asset('icons/delete.png')}}" alt="Deletar"></a>
                        
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>

@endsection