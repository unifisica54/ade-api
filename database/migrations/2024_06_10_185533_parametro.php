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
        Schema::create('parametro', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('secuencia')->nullable();
            $table->bigInteger('tipo')->nullable();
            $table->string('descripcion', 200)->nullable();
            $table->timestamps();
            $table->bigInteger('users_id')->nullable();
            $table->bigInteger('status')->nullable();
            $table->index(['users_id','status']);
            $table->index(['secuencia','tipo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametro');
    }
};
