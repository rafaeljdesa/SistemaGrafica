@extends('layouts._home')
@section('content')
    
    <h3 class="text-center">Cadastro de orçamento</h3>

    <form action="" id="form-material" method="post">
        
        @include('layouts._form_orcamentos')
        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>


@endsection