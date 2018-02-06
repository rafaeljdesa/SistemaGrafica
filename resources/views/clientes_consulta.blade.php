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
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>               
                    
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->telefone}}</td>
                    <td>{{$cliente->email}}</td>    
                    <td>
                        <a class="btn btn-warning mr-2" href="{{route('clientes.editar', $cliente->id)}}">Editar</button>
                        <a class="btn btn-danger deletar" href="javascript: if(confirm('Deseja deletar este cliente?')){ window.location.href = '{{route('clientes.deletar', $cliente->id)}}' } ">Deletar</button>
                        
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>

@endsection