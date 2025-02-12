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
        Schema::table('articles', function (Blueprint $table) {
            $table->string('slug_ind')->nullable()->after('slug'); // Use string instead of text
            $table->string('category')->nullable()->after('isPublished');
            $table->string('category_ind')->nullable()->after('category');
            $table->json('tags')->nullable()->after('category_ind'); // Use JSON for multiple values
            $table->json('tags_ind')->nullable()->after('tags'); // Use JSON for multiple values
            $table->text('meta_description')->nullable()->after('content_english');
            $table->text('meta_description_ind')->nullable()->after('content_indonesia');
            $table->string('keyword')->nullable()->after('thumbnail'); // String is enough
            $table->string('keyword_ind')->nullable()->after('keyword');
            $table->string('link_ind')->nullable()->after('link');
            $table->unsignedBigInteger('author_id')->nullable()->after('link_ind');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn([
                'slug_ind',
                'category',
                'category_ind',
                'tags',
                'tags_ind',
                'meta_description',
                'meta_description_ind',
                'keyword',
                'keyword_ind',
                'link_ind',
                'author',
            ]);
        });
    }
};
