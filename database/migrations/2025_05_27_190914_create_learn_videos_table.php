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
        Schema::create('learn_videos', function (Blueprint $table) {
            $table->unsignedBigInteger('learn_video_id')->primary();
            $table->unsignedBigInteger('word_id');
            $table->string('video_url');

            $table->foreign('word_id')
                ->references('word_id')
                ->on('word')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learn_videos');
    }
};
