@extends('layouts._home')
@section('content')
    <div class="row align-center">        
        <div class="col-12">    
                <img id="imagem-fundo" class="mx-auto d-block mt-3" src="{{asset('img/logo.jpg')}}" alt="Logo">
        </div>
    </div>

    <div class="footer p-3">
        <p class="text-center text-muted">&copy {{date('Y')}} - Rafael de Sá</p>
    </div>
@endsection