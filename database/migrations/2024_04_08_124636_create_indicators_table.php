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
        Schema::create('indicators', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('Product');

            for ($i = 1; $i <= 20; $i++) {
                $table->text("Product{$i}")->nullable();
                $table->text("Analyse{$i}")->nullable();
                $table->text("Deviation{$i}")->nullable();
                $table->text("Tol{$i}")->nullable();
            }

            $table->text('date');
            $table->text('Tamin');
            $table->text('VaznKol');
            $table->text('TolKol');
            $table->text('AnzKol');
            $table->text('ShKol');
            $table->text('EnherafKol');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicators');
    }
};
