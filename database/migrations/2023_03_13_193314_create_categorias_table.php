<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('categoria',100);
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('categorias')->insert(
            array(
                ['categoria' => 'CLIENTE', 'created_at' => now(), 'updated_at'=> now()],
                ['categoria' => 'PROVEEDOR', 'created_at' => now(), 'updated_at'=> now()],
                ['categoria' => 'FUNCIONARIO', 'created_at' => now(), 'updated_at'=> now()],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
