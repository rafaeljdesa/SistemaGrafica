<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Produtos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table){
            $table->increments('id');
            $table->string('nome');
            $table->string('vias');
            $table->string('tamanho');
            $table->boolean('numerar');
            $table->boolean('serrilhar');
            $table->decimal('preco', 8, 3);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
