<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
{
    public function cadastrar(request $request){

        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;

        $cliente->save();
        
        return redirect()->route('clientes.cadastro')
                         ->with('status', 'Cliente cadastrado com sucesso!');

    }
}
