<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('nome_social')->nullable();;
            $table->enum('tipo', ['FISICA','JURIDICA']);
            $table->json('endereco')->nullable();;
            $table->json('contato')->nullable();;
            $table->timestamps();
            $table->softDeletes();
            $table->index('nome');
            $table->index('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
