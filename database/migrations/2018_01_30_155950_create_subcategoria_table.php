<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategoria', function (Blueprint $table) {
            $table->increments('id_subcategoria');
            $table->integer('id_categoria')->unsigned();
            $table->string('subcategoria');
            $table->timestamps();
            $table->tinyInteger('activo')->default(1);
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategoria');
    }
}
