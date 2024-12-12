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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('slugs', 255)->nullable(false)->unique();
            $table->string('title_indonesia', 255)->nullable(false);
            $table->string('title_english', 255)->nullable(false);
            $table->longText('content_indonesia')->nullable();
            $table->longText('content_english')->nullable();
            $table->string('thumbnail', 255)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
