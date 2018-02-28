@extends('layouts._home')
@section('content')
    
    <h3 class="text-center">Edição de serviço</h3>

    <form action="{{route('servicos.atualizar', $servico->id)}}" id="form-servico" method="post">
        
        @include('layouts._form_servicos')
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>


@endsection