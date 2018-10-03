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
        Schema::table('prdutos', function (Blueprint $table) {
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
        });
    }
}
