@extends('layouts._home')
@section('content')
        <h3 class="text-center">Cadastro de orçamento</h3>

        <form action="#" id="form-orcamento" method="post">
            
            @include('layouts._form_orcamentos')
            
            <a class="btn btn-warning mb-3" href="{{route('orcamentos.cadastro')}}">Limpar</a>
            <button type="submit" class="btn btn-success mb-3">Cadastrar</button>
        
        </form>
@endsection
