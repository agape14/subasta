<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('urbanizacion');
            $table->string('mz');
            $table->string('lote');
            $table->decimal('area', 18,2);
            $table->string('partida_registral');
            $table->decimal('precio_base', 18,2);
            $table->decimal('garantia', 18,2);
            $table->foreignId('id_ubigeo')
                  ->nullable()
                  ->constrained('ubigeos')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
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
        Schema::dropIfExists('inmuebles');
    }
}
