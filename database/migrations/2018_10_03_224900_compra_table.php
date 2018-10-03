<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id')->unsigned()->nullable();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->json('produtos');
            $table->json('endereco_entrega');
            $table->enum('forma_pagamento', ['Boleto', 'Cartão']);
            $table->double('valor_compra', 8, 2);
            $table->double('valor_desconto', 8, 2);
            $table->double('valor_total', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra');
    }
}
