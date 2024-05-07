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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('CarName');
            $table->text('CarColor');
            $table->text('CarPlate')->nullable()->default("ثبت نشده");
            $table->string('image')->nullable();
            $table->string('BimeSales')->nullable();
            $table->string('CarCard')->nullable();
            $table->string('BargSabz')->nullable();
            $table->string('Badane')->nullable();
            $table->text('Kilometer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
