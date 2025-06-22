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
        Schema::create('tbdespesas', function (Blueprint $table) {
            $table->id('descodigo');
            $table->string('desdescricao');
            $table->decimal('desvalor', 10, 2);
            $table->date('desdata');
            $table->foreignId('catcodigo')->constrained('tbcategorias', 'catcodigo')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbdespesas');
    }
};
