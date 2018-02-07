@extends('layouts._home')
@section('content')
    
    <h3 class="text-center">Edição de produto</h3>

    <form action="{{route('materiais.atualizar', $material->id)}}" id="form-material" method="post">
        
        @include('layouts._form_materiais')
        
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>


@endsection