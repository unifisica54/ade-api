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
        Schema::create('numero_orden', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 20);
            $table->bigInteger('cantidad')->nullable();
            $table->bigInteger('casos_id')->nullable();
            $table->bigInteger('guia_devolucion_id')->nullable();
            $table->timestamps();
            $table->bigInteger('users_id')->nullable();
            $table->bigInteger('status')->nullable();
            $table->index(['users_id','status']);
            $table->index(['casos_id','guia_devolucion_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('numero_orden');
    }
};
