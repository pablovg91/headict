<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->float('precio', 6, 2);
            $table->integer('stock');
            $table->integer('tipo_id')->unsigned()->default(0);
            $table->foreign('tipo_id')->references('id')->on('tipos');
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
        Schema::dropIfExists('articulos');
    }
}
