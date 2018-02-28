@extends('layouts._home')
@section('content')
        
        @if(session('status'))
          <div class="alert alert-success mt-2 text-center">
              {{ session('status') }}
          </div>
        @endif
    
    <h3 class="text-center">Cadastro de servicos</h3>

    <form action="{{route('servicos.cadastrar')}}" id="form-servicos" method="post">
        
        @include('layouts._form_servicos')
        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>


@endsection