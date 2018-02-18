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
        
        $_SESSION['material'] = array();
        
        $produtos = Produto::all();
        $materiais = Material::all();
        $clientes = Cliente::all();

        return view('orcamentos_cadastro',['produtos' => $produtos,
                                           'materiais' => $materiais,
                                           'clientes' => $clientes]);
    }

    public function lancarProduto($id){

        session_start(); 

        $produtoLancar = DB::table('produtos')->where('id', $id )->get();

        $materialLancar = DB::table('materiais')->where('produto_id', $id )->get();

       foreach($produtoLancar as $p){
            $_SESSION['produto'][] = 
            [
                'id'        =>   $p->id,
                'nome'      =>   $p->nome,
                'vias'      =>   $p->vias,
                'tamanho'   =>   $p->tamanho,
                'preco'     =>   $p->preco
            ];
       }     

       $produtoLancar = $_SESSION['produto'];
       
       foreach($materialLancar as $m){
            $_SESSION['material'][] = 
            [
                'id'           =>   $m->id,
                'nome'         =>   $m->nome,
                'produto_id'   =>   $m->produto_id,
                'preco'        =>   $m->preco
                
            ];
       }     

        $materialLancar = $_SESSION['material'];

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
