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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->string('invoice_number')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('province_id');
            $table->string('district_id');
            $table->string('ward_id');
            $table->string('address');
            $table->tinyInteger('shipping_method');
            $table->tinyInteger('payment_method');
            $table->integer('discount');
            $table->integer('subtotal');
            $table->integer('shipping_fee');
            $table->integer('total');
            $table->string('status');
            $table->tinyInteger('payment_status');
            $table->tinyInteger('shipping_status');
            $table->string('note')->nullable();
            $table->string('cancel_reason')->nullable();
            $table->timestamps();
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