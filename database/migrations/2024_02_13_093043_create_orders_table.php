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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('ProductNo');
            $table->text('ProductComment');
            $table->text('ProductId');
            $table->text('Vahed');
            $table->text('Details2');
            $table->text('Address');
            $table->text('PhoneNumber');
            $table->text('Firstname');
            $table->text('Lastname');
            $table->text('email');
            $table->text('Vaziat')->nullable();
            $table->text('Count');
            $table->text('Sort');
            $table->text('Storage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
