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
        Schema::create('book_proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->references('id')->on('book_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('publisher_id')->references('id')->on('book_publishers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('book_title');
            $table->string('publication_year');
            $table->string('book_author')->nullable();
            $table->string('book_cover_path')->nullable();
            $table->text('reason');
            $table->string('book_price')->nullable();
            $table->enum('book_type', ['softfile', 'hardfile']);
            $table->enum('status', ['pending', 'approved', 'rejected', 'closed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_proposals');
    }
};
