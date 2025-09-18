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
        Schema::create('kartings', function (Blueprint $table) {
            $table->id();
            $table->string('marca',100);
            $table->string('modelo',100);
            $table->year('anio');
            $table->string('tipo_motor',100);
            $table->float('precio_alquiler',8,2);
            $table->string('imagen',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartings');
    }
};
