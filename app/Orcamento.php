<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $table = 'orcamentos';
    
    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }

}
