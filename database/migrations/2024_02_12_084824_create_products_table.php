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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('Sort');
            $table->text('ProductComment');
            $table->text('ProductId')->nullable();
            $table->text('Price')->nullable();
            $table->text('Details2')->nullable();
            $table->text('Vahed');
            $table->string('ProductImage')->nullable();
            $table->text('Storage')->nullable();
            $table->text('OrderDot')->nullable();
            $table->text('Wastage')->nullable();
            $table->text('Cleaned')->nullable();
            $table->text('Indicate')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
