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
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 100);
            $table->string('designation', 100);
            $table->string('telephone', 100);
            $table->string('mobile', 100);
            $table->string('email', 100)->unique();
            $table->string('facebook_id', 100)->unique();
            $table->string('twitter_id', 100)->unique();
            $table->string('pinterest_id', 100)->unique();
            $table->text('profile')->nullable();
            $table->string('team_img', 100);
            $table->string('status', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team');
    }
};
