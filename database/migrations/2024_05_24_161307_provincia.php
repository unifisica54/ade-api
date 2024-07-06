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
        Schema::create('provincia', function (Blueprint $table) {
            $table->id();
            $table->string('ubigeo', 10)->nullable();
            $table->string('nombre', 50)->nullable();
            $table->string('departamento_id', 10)->nullable();
            $table->bigInteger('status')->nullable();
            $table->index(['ubigeo','departamento_id']);
            $table->index(['status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provincia');
    }
};
