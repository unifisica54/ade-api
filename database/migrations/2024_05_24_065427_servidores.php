<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(); // Nombre del equipo
            $table->string('tipo')->nullable(); // Tipo de equipo (servidor, pc, router, etc.)
            $table->string('marca', 100)->nullable();
            $table->string('modelo', 100)->nullable();
            $table->string('generacion', 100)->nullable();
            $table->string('numero_serie')->nullable()->unique(); // Número de serie
            $table->timestamps();
            $table->bigInteger('users_id')->nullable();
            $table->bigInteger('status')->nullable();
            $table->index(['users_id','status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
