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
        Schema::create('sucursal_servicio', function (Blueprint $table) {
            $table->id(); // bigInteger unsigned
            $table->unsignedBigInteger('sucursal_id'); // Debe ser unsignedBigInteger
            $table->unsignedBigInteger('servicio_id'); // Debe ser unsignedBigInteger
            $table->timestamps();

            $table->foreign('sucursal_id')->references('id')->on('sucursals')->onDelete('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sucursal_servicio');
    }
};
