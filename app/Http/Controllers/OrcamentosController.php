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
       
       foreach($materialLancar as $m){
            $_SESSION['material'][] = 
            [
                'id'           =>   $m->id,
                'nome'         =>   $m->nome,
                'produto_id'   =>   $m->produto_id,
                'preco'        =>   $m->preco
                
            ];
       }     

        $produtoLancar = $_SESSION['produto'];

        $materialLancar = $_SESSION['material'];

        $produtos = Produto::all();
        $materiais = Material::all();
        $clientes = Cliente::all();              
        
        $total = $this->calculaTotal($produtoLancar);
               
        return view('orcamentos_cadastro',['produtos' => $produtos,
                                           'materiais' => $materiais,
                                           'clientes' => $clientes,
                                           'produtoLancar' => $produtoLancar,
                                           'materialLancar' => $materialLancar,
                                           'total' => $total]);                                                         
    
                                                 
    }

    public function lancarMaterial($id){
        
        session_start();

        $materialLancar = DB::table('materiais')->where('id', $id )->get();

        foreach($materialLancar as $m){
            $_SESSION['material'][] = 
            [
                'id'           =>   $m->id,
                'nome'         =>   $m->nome,
                'produto_id'   =>   $m->produto_id,
                'preco'        =>   $m->preco
                
            ];
        }     
        
        $produtoLancar = $_SESSION['produto'];

        $materialLancar = $_SESSION['material'];
        
        $produtos = Produto::all();
        $materiais = Material::all();
        $clientes = Cliente::all();

        $total = $this->calculaTotal($materialLancar);
        
        return view('orcamentos_cadastro',['produtos' => $produtos,
                                           'materiais' => $materiais,
                                           'clientes' => $clientes,
                                           'produtoLancar' => $produtoLancar,
                                           'materialLancar' => $materialLancar]);
    }

    public function calculaTotal($itemLancar){
        if(!isset($total)){
            $total = 0;
        }else{
            foreach($itemLancar as $itemLancado){
                $total += $itemLancado['preco'];
            }
        }
        
        return number_format($total, 2, ',', '.');
    }

}
