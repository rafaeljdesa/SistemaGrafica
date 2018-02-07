@extends('layouts._home')
@section('content')
        
        @if(session('status'))
          <div class="alert alert-success mt-2 text-center">
              {{ session('status') }}
          </div>
        @endif
    
    <h3 class="text-center">Cadastro de produtos</h3>

    <form action="{{route('produtos.cadastrar')}}" id="form-produtos" method="post">
        
        @include('layouts._form_produtos')
        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>


@endsection