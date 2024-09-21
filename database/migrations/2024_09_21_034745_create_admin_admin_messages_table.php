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
        Schema::create('admin_admin_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('admins')->onDelete('cascade');
            $table->foreignId('receiver_id')->constrained('admins')->onDelete('cascade');
            $table->text('message');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_read')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_admin_messages');
    }
};