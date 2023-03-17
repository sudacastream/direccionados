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
        Schema::create('merchandising', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->string('token');
            $table->string('producto');
            $table->string('cantidad');
            $table->string('precio');
            $table->string('pago');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchandising');
    }
};
