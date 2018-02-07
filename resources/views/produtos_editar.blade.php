@extends('layouts._home')
@section('content')
    
    <h3 class="text-center">Edição de produto</h3>

    <form action="{{route('produtos.atualizar', $produto->id)}}" id="form-produto" method="post">
        
        @include('layouts._form_produtos')
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>


@endsection