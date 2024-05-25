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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('publication_year');
            $table->integer('jumlah')->default(1);
            $table->foreignId('publisher_id')->references('id')->on('book_publishers')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category_id')->references('id')->on('book_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('jenis', ['softfile', 'hardfile']);
            $table->string('pdf_path')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('validation')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
