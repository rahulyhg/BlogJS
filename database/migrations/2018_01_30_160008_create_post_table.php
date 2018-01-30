<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id_post');
            $table->integer('id_subcategoria')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->string('titulo');
            $table->string('descripcion_foto');
            $table->string('breve_descripcion', 255);
            $table->text('descripcion');
            $table->text('etiquetas');
            $table->timestamps();
            $table->tinyInteger('activo')->default(1);
            $table->foreign('id_subcategoria')->references('id_subcategoria')->on('subcategoria');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
