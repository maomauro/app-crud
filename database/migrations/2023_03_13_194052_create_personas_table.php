<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->string('tipoIdentificacion',5);
            $table->string('identificacion',15);
            $table->string('email',150);
            $table->string('pais',50);
            $table->string('direccion',100);
            $table->string('celular',10);
            $table->unsignedBigInteger('categoriaId')->unsigned;
            $table->timestamps();
            $table->foreign('categoriaId')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
