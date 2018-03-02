<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiais';
    public $timestamps = false;
    
    public function produto(){
        return $this->belongsTo('App\Produto');
    }
}
