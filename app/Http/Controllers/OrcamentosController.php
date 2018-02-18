<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Orcamento;
use App\Material;
use App\Produto;
use App\Cliente;

class OrcamentosController extends Controller
{
    
    public function index(){

        session_start();

        $_SESSION['produto'] = array();
        
        $produtos = Produto::all();
        $materiais = Material::all();
        $clientes = Cliente::all();

        return view('orcamentos_cadastro',['produtos' => $produtos,
                                           'materiais' => $materiais,
                                           'clientes' => $clientes]);
    }

    public function lancarProduto($id){

        session_start();

        $_SESSION['produto'][] = $id; 

        $produtoLancar = DB::table('produtos')->whereIn('id',[$_SESSION['produto']] )->get();

        $materialLancar = DB::table('materiais')->whereIn('produto_id', [$_SESSION['produto']] )->get();

        // dd($_SESSION['produto']);

        /* return redirect()->route('orcamentos.cadastro', ['produtoLancar' => $produtoLancar,
                                                        'materialLancar' => $materialLancar]); */

        $produtos = Produto::all();
        $materiais = Material::all();
        $clientes = Cliente::all();                                                        
        
        return view('orcamentos_cadastro',['produtos' => $produtos,
                                           'materiais' => $materiais,
                                           'clientes' => $clientes,
                                           'produtoLancar' => $produtoLancar,
                                           'materialLancar' => $materialLancar]);                                                         
    
                                                 
    }

}
