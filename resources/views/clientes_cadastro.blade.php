@extends('layouts._home')
@section('content')
        
        @if(session('status'))
          <div class="alert alert-success mt-2 text-center">
              {{ session('status') }}
          </div>
        @endif
    
    <h3 class="text-center">Cadastro de clientes</h3>

    <form action="{{route('clientes.cadastrar')}}" id="form-cliente" method="post">
        
        @include('layouts._form_clientes')
        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>


@endsection