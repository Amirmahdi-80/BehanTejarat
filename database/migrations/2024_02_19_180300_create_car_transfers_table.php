<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('car_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('driver_id');
            $table->date('date')->default(now())->comment('Date of transfer');
            // Exit and enter columns
            for ($i = 1; $i <= 4; $i++) {
                $table->text("exit{$i}")->nullable()->comment("Exit location {$i}");
                $table->text("enter{$i}")->nullable()->comment("Enter location {$i}");
            }
            $table->float('ExitDistance')->comment('Exit distance');
            $table->float('EnterDistance')->nullable()->comment('Enter distance');
            $table->float('Kilometer')->comment('Total distance');
            $table->text('Tozih')->nullable()->comment('Explanation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('car_transfers');
    }
};
