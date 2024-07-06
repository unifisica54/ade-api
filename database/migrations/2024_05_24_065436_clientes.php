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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('ruc', 15)->nullable();
            $table->string('razon_social', 250);
            $table->string('telefono', 12)->nullable();
            $table->string('correo', 100)->nullable();
            $table->string('direccion', 200)->nullable();
            $table->string('ubigeo_id', 15)->nullable();
            $table->timestamps();
            $table->bigInteger('users_id')->nullable();
            $table->bigInteger('status')->nullable();
            $table->index(['users_id','status','ubigeo_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
