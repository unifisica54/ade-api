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
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 50);
            $table->text('tarea')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->bigInteger('acciones_id')->nullable();
            $table->bigInteger('equipos_id')->nullable();
            $table->bigInteger('clientes_id')->nullable();
            $table->bigInteger('estado_id')->nullable();
            $table->decimal('precio_movilidad_ida',7,2)->nullable();
            $table->decimal('precio_movilidad_vuelta',7,2)->nullable();
            $table->timestamps();
            $table->bigInteger('users_id')->nullable();
            $table->bigInteger('status')->nullable();
            $table->index(['users_id','status']);
            $table->index(['acciones_id','equipos_id']);
            $table->index(['clientes_id','estado_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casos');
    }
};
