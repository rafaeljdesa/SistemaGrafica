<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItensOrcamento extends Model
{
    protected $table = 'itens_orcamentos';
    public $timestamps = false;
    
    public function orcamento(){
        return $this->belongsTo('App\Orcamento', 'orcamento_id');
    }

    public function produto(){
        return $this->belongsTo('App\Produto', 'produto_id');
    }

    public function material(){
        return $this->belongsTo('App\Material', 'material_id');
    }

    public function servico(){
        return $this->belongsTo('App\Servico', 'servico_id');
    }
}
