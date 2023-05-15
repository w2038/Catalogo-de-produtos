<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categorias_id')->unsigned();
            $table->foreign('categoria_id')->reference('id')->on('categorias');
            $table->string('codigo');
            $table->string('nome');
            $table->float('preco');
            $table->float('preco_promocional')->nullable();
            $table->boolen('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
