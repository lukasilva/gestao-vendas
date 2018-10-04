<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriaToProtudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->integer('pessoa_id')->unsigned()->nullable();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prdutos', function (Blueprint $table) {
            $table->dropForeign('categoria_id');
            $table->dropColumn('categoria_id');
            $table->dropForeign('pessoa_id');
            $table->dropColumn('pessoa_id');
        });
    }
}
