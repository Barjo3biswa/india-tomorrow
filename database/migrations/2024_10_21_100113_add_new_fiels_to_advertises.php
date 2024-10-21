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
        Schema::table('advertises', function (Blueprint $table) {
            $table->softDeletes();
            $table->string('title',255)->nullable();
            $table->string('file',255)->nullable();
            $table->string('is_main_page',10)->nullable();
            $table->string('is_all_news',10)->nullable();
            $table->string('in_specific_news',10)->nullable();
            $table->longText('news_ids')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('advertises', function (Blueprint $table) {
            //
        });
    }
};
