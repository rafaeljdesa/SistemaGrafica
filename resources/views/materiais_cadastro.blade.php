@extends('layouts._home')
@section('content')
        
        @if(session('status'))
          <div class="alert alert-success mt-2 text-center">
              {{ session('status') }}
          </div>
        @endif
    
    <h3 class="text-center">Cadastro de materiais</h3>

    <form action="{{route('materiais.cadastrar')}}" id="form-materiais" method="post">
        
        @include('layouts._form_materiais')
        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>


@endsection