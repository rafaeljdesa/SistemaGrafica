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
        
        if(isset($_SESSION['produto'][$id])){
            $_SESSION['produto'][$id]['quantidade'] += 1;
        }else{
            foreach($produtoLancar as $p){
                $_SESSION['produto'][$id] = 
                [
                    'id'            =>   $p->id,
                    'nome'          =>   $p->nome,
                    'vias'          =>   $p->vias,
                    'tamanho'       =>   $p->tamanho,
                    'preco'         =>   $p->preco,
                    'quantidade'    =>   1
                ];
            }
        }
        
        
       foreach($materialLancar as $m){
           if(isset($_SESSION['material'][$m->id])){
                $_SESSION['material'][$m->id]['quantidade'] += 1;
           }else{
                $_SESSION['material'][$m->id] = 
                [
                    'id'           =>   $m->id,
                    'nome'         =>   $m->nome,
                    'produto_id'   =>   $m->produto_id,
                    'preco'        =>   $m->preco,
                    'quantidade'   =>   1
                ];
           }

            
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

        if(isset($_SESSION['material'][$id])){
            $_SESSION['material'][$id]['quantidade'] += 1;
        }else{
            foreach($materialLancar as $m){
                $_SESSION['material'][$id] = 
                [
                    'id'           =>   $m->id,
                    'nome'         =>   $m->nome,
                    'produto_id'   =>   $m->produto_id,
                    'preco'        =>   $m->preco,
                    'quantidade'   =>   1
                    
                ];
            }     
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

    public function deletarProduto($id){
        
        session_start();

        unset($_SESSION['produto'][$id]);

        $produtoLancar = $_SESSION['produto'];

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

    public function deletarMaterial($id){
        
        session_start();

        unset($_SESSION['material'][$id]);

        $produtoLancar = $_SESSION['produto'];

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
