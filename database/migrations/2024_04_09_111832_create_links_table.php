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
        Schema::create('links', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
        $table->text('date');
        $table->text('PName');
        $table->text('ProName1');
        for ($i = 2; $i <= 20; $i++) {
            $table->text("ProName{$i}")->nullable();
        }
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
