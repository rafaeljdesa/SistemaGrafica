@extends('layouts._home')
@section('content')


    @if(session('status'))
        <div class="alert alert-success mt-2 text-center">
            {{ session('status') }}
        </div>
    @endif

    <h3 class="text-center">Consulta de clientes</h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">E-mail</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>               
                    
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->telefone}}</td>
                    <td>{{$cliente->email}}</td>    
                    <td>
                        <a class="mr-2" href="{{route('clientes.editar', $cliente->id)}}"><img src="{{asset('icons/edit.png')}}" alt="Editar"></a>
                        <a class="" href="javascript: if(confirm('Deseja deletar este cliente?')){ window.location.href = '{{route('clientes.deletar', $cliente->id)}}' } "><img src="{{asset('icons/delete.png')}}" alt="Deletar"></a>
                    
                        
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>

@endsection