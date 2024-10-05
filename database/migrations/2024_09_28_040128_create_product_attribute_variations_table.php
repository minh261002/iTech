<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_attribute_variations', function (Blueprint $table) {
            $table->unsignedBigInteger('product_attribute_id');
            $table->unsignedBigInteger('attribute_variation_id');
            $table->primary(['product_attribute_id', 'attribute_variation_id']);

            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onDelete('cascade');
            $table->foreign('attribute_variation_id')->references('id')->on('attribute_variations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attribute_variations');
    }
};