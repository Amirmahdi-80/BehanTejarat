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
        Schema::create('voruds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('TotalPrice')->nullable();
            $table->text('Count')->nullable();
            $table->text('enterPrice')->nullable();
            $table->text('date');
            $table->text('TName');
            $table->text('PName');
            $table->text('TotalPrice2')->nullable();
            $table->text('Count2')->nullable();
            $table->text('TS')->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voruds');
    }
};
