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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 150)->nullable();
            $table->string('apel_paterno', 150)->nullable();
            $table->string('apel_materno', 150)->nullable();
            $table->bigInteger('tipo_documento_id')->nullable();
            $table->string('numero_documento', 15)->nullable();
            $table->string('telefono', 12)->nullable();
            $table->string('correo', 100)->nullable();
            $table->timestamps();
            $table->bigInteger('users_id')->nullable();
            $table->bigInteger('status')->nullable();
            $table->index(['users_id','status','tipo_documento_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
