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
        Schema::create('book_donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignId('category_id')->references('id')->on('book_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('book_id')->references('id')->on('books')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_donations');
    }
};
