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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_category');
            $table->unsignedInteger('id_order')->nullable();
            $table->string('name');
            $table->string('sex');
            $table->string('image');
            $table->string('id_image')->nullable();
            $table->timestamps();

            $table->foreign('id_order')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_category')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
