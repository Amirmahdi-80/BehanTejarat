<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cost', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('date');
            $table->text('CarNam')->nullable();
            $table->text('HaNam')->nullable();
            $table->text('Group');

            for ($i = 1; $i <= 15; $i++) {
                $table->text('date' . $i)->nullable();
                $table->text('Sharh' . $i)->nullable();
                $table->text('Price' . $i)->nullable();
            }

            $table->text('PriceKol');
        });
    }

    public function down(): void {
        Schema::dropIfExists('cost');
    }
};

