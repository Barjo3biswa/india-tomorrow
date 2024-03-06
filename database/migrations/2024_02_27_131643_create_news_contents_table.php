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
        Schema::create('news_contents', function (Blueprint $table) {
            $table->id();
            $table->longText('news_title')->nullable();
            $table->longText('news_slug')->nullable();
            $table->longText('news_sub_title')->nullable();
            $table->string('image',255)->nullable();
            $table->longText('image_caption')->nullable();
            $table->longText('youtube_url')->nullable();
            $table->longText('description')->nullable();
            $table->timestamp('news_date')->nullable();
            $table->time('news_time')->nullable();
            $table->string('reported_by')->nullable();
            $table->string('photo_or_video',50)->default('photo');
            $table->longText('category')->nullable();
            $table->string('scrolling',10)->nullable();
            $table->string('archive',10)->nullable();
            $table->string('status',20)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_contents');
    }
};
