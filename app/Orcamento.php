<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $table = 'orcamentos';
    public $timestamps = false;
    
    public function cliente(){
        return $this->belongsTo('App\Cliente', 'cliente_id');
    }

    public function itens(){
        return $this->hasMany('App\ItensOrcamento');
    }
}
