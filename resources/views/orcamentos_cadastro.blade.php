@extends('layouts._home')
@section('content')
        
        @if(session('status'))
          <div class="alert alert-success mt-2 text-center">
              {{ session('status') }}
          </div>
        @endif
        
        <h3 class="text-center">Criação de orçamento</h3>

        <form action="{{route('orcamentos.criar')}}" id="form-orcamento" method="post">
            
            {{ csrf_field() }}

            @include('layouts._form_orcamentos')
            
            <a class="btn btn-warning mb-3" href="{{route('orcamentos.cadastro')}}">Limpar</a>
            <button type="submit" class="btn btn-success mb-3">Criar</button>
        
        </form>
@endsection
