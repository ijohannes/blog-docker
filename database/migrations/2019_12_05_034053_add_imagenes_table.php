<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreImg');

            $table->bigInteger('articulo_id')->unsigned()->nullable();
            $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete('cascade');

            $table->bigInteger('programa_id')->unsigned()->nullable();
            $table->foreign('programa_id')->references('id')->on('programas')->onDelete('cascade');

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
        Schema::dropIfExists('imagenes');
    }
}
