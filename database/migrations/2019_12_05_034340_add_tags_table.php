<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreTag');
            $table->timestamps();
        });

        //articulos & tags = articulo_tag
        Schema::create('articulo_tag', function(Blueprint $table){
          $table->bigIncrements('id');
          $table->bigInteger('articulo_id')->unsigned();
          $table->bigInteger('tag_id')->unsigned();

          $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete('cascade');
          $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

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
        Schema::dropIfExists('tags');
    }
}
