@extends('layouts._home')
@section('content')
    
    <h3 class="text-center">Cadastro de clientes</h3>

    <form action="{{route('clientes.cadastrar')}}" id="form-cliente" method="post">
        
        {{ csrf_field() }}
              
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone">
        </div>
        <div class="form-group">
            <label for="telefone">E-mail</label>
            <input type="email" class="form-control" id="email">
        </div>
        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>


@endsection