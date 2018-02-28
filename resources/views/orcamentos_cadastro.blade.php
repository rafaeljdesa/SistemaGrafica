@extends('layouts._home')
@section('content')
    
    <h3 class="text-center">Cadastro de orçamento</h3>

    <form action="#" id="form-material" method="post">
        
        @include('layouts._form_orcamentos')
        
        <a class="btn btn-warning" href="{{route('orcamentos.cadastro')}}">Limpar</a>
        <button type="submit" class="btn btn-success">Cadastrar</button>
    
    </form>


@endsection
