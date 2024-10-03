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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->char('code', 50)->nullable();
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->integer('max_usage')->nullable();
            $table->double('min_order_amount')->nullable();
            $table->tinyInteger('type')->default(1); //1: tiền, 2: phần trăm
            $table->double('discount_value')->nullable();
            $table->double('percent_value')->nullable();
            $table->tinyInteger('status')->default(1); //1: inActive, 2: Active
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};