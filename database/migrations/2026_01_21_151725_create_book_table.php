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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('author_id');
            $table->string('title', 100);
            $table->string('slug', 100);
            $table->string('availability');
            $table->string('price');
            $table->string('rating')->nullable();
            $table->string('publisher');
            $table->string('country_of_publisher');
            $table->string('isbn', 100);
            $table->string('isbn-10', 100);
            $table->string('audience', 100);
            $table->string('format', 100);
            $table->string('language', 100);
            $table->text('description');
            $table->string('book_upload', 100);
            $table->string('book_img', 100);
            $table->string('total_pages', 100)->nullable();
            $table->string('downloaded', 100)->nullable();
            $table->string('edition_number', 100)->nullable();
            $table->string('recommended', 100)->nullable();
            $table->string('status', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
