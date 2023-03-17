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
        Schema::create('buffet', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->string('token');
            $table->integer('cantidad');
            $table->string('precio');
            $table->boolean('pago');
            $table->boolean('retiro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buffet');
    }
};
