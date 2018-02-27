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
        
        $totalProdutos = $this->calculaTotProd();

        $totalMateriais = $this->calculaTotMat();
               
        return view('orcamentos_cadastro',['produtos' => $produtos,
                                           'materiais' => $materiais,
                                           'clientes' => $clientes,
                                           'produtoLancar' => $produtoLancar,
                                           'materialLancar' => $materialLancar,
                                           'totalProdutos' => $totalProdutos,                                                         
                                           'totalMateriais' => $totalMateriais]);                                                         
    
                                                 
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
        
        $totalProdutos = $this->calculaTotProd();

        $totalMateriais = $this->calculaTotMat();
               
        return view('orcamentos_cadastro',['produtos'       => $produtos,
                                           'materiais'      => $materiais,
                                           'clientes'       => $clientes,
                                           'produtoLancar'  => $produtoLancar,
                                           'materialLancar' => $materialLancar,
                                           'totalProdutos'  => $totalProdutos,                                                         
                                           'totalMateriais' => $totalMateriais]); 
    }

    public function deletarProduto($id){
        
        session_start();

        unset($_SESSION['produto'][$id]);

        $produtoLancar = $_SESSION['produto'];

        $materialLancar = $_SESSION['material'];
        
        $produtos = Produto::all();
        $materiais = Material::all();
        $clientes = Cliente::all();
        
        $totalProdutos = $this->calculaTotProd();

        $totalMateriais = $this->calculaTotMat();
               
        return view('orcamentos_cadastro',['produtos'       => $produtos,
                                           'materiais'      => $materiais,
                                           'clientes'       => $clientes,
                                           'produtoLancar'  => $produtoLancar,
                                           'materialLancar' => $materialLancar,
                                           'totalProdutos'  => $totalProdutos,                                                         
                                           'totalMateriais' => $totalMateriais]); 

    }

    public function deletarMaterial($id){
        
        session_start();

        unset($_SESSION['material'][$id]);

        $produtoLancar = $_SESSION['produto'];

        $materialLancar = $_SESSION['material'];
        
        $produtos = Produto::all();
        $materiais = Material::all();
        $clientes = Cliente::all();
        
        $totalProdutos = $this->calculaTotProd();

        $totalMateriais = $this->calculaTotMat();
               
        return view('orcamentos_cadastro',['produtos'       => $produtos,
                                           'materiais'      => $materiais,
                                           'clientes'       => $clientes,
                                           'produtoLancar'  => $produtoLancar,
                                           'materialLancar' => $materialLancar,
                                           'totalProdutos'  => $totalProdutos,                                                         
                                           'totalMateriais' => $totalMateriais]); 

    }

    public function calculaTotProd(){

        $totalProdutos = 0;

        if(isset($_SESSION['produto'])){
            foreach($_SESSION['produto'] as $produto){
                $totalProdutos += ($produto['preco'] * $produto['quantidade']);
            }
        }

        return $totalProdutos;
    }

    public function calculaTotMat(){

        $totalMateriais = 0;

        if(isset($_SESSION['material'])){
            foreach($_SESSION['material'] as $material){
                $totalMateriais += ($material['preco'] * $material['quantidade']);
            }
        }
        
        return $totalMateriais;
    }

}
