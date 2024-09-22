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
        Schema::create('post_catalogues', function (Blueprint $table) {
            $table->id();
            $table->integer('_lft');
            $table->integer('_rgt');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->integer('position')->default(0);
            $table->tinyInteger('status');
            $table->longText('desc')->nullable();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('post_catalogues')->onUpdate('NO ACTION')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_catalogues', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['parent_id']);
        });
        Schema::dropIfExists('post_catalogues');
    }
};