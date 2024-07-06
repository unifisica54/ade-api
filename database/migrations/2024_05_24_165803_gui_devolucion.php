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
        Schema::create('guia_devolucion', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 50)->nullable();
            $table->date('fecha')->nullable();
            $table->bigInteger('estado_pieza_id')->nullable();
            $table->timestamps();
            $table->bigInteger('users_id')->nullable();
            $table->bigInteger('status')->nullable();
            $table->index(['users_id','status']);
            $table->index(['estado_pieza_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guia_devolucion');
    }
};
