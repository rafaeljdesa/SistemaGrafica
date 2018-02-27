<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItensOrcamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_orcamentos', function (Blueprint $table){
            $table->increments('id');
            $table->integer('orcamento_id')->unsigned();
            $table->foreign('orcamento_id')->references('id')->on('orcamentos');
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->integer('material_id')->unsigned();
            $table->foreign('material_id')->references('id')->on('materiais');
            $table->integer('servico_id')->unsigned();
            $table->foreign('servico_id')->references('id')->on('servicos');                   

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens_orcamentos');
    }
}
