<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     */

    public function up()
    {

        Schema::create('evento_voluntario', function (Blueprint $table) {
            $table->primary(['evento_id', 'voluntario_id']);
            $table->foreignId('evento_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('voluntario_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('asistencia')->nullable();
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
        Schema::dropIfExists('evento_voluntarios');
    }
};
