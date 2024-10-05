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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->default(1); //1: sản phẩm đơn giản, 2: sản phẩm biến thể
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->string('sku')->unique();
            $table->integer('qty')->nullable();
            $table->tinyInteger('status')->default(1); //1: active, 2: inactive
            $table->text('desc')->nullable();
            $table->string('image')->nullable();
            $table->longText('gallery')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
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