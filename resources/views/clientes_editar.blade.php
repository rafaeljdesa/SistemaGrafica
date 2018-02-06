@extends('layouts._home')
@section('content')
    
    <h3 class="text-center">Edição de cliente</h3>

    <form action="{{route('clientes.atualizar', $cliente->id)}}" id="form-cliente" method="post">
        
        @include('layouts._form_clientes')
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>


@endsection