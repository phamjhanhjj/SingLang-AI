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
        Schema::create('practise_video', function (Blueprint $table) {
            $table->unsignedBigInteger('practise_video_id')->primary();
            $table->unsignedBigInteger('course_id');
            $table->string('video_link');
            $table->json('sublitle')->nullable();
            $table->integer('score')->default(0);

            $table->foreign('course_id')
                ->references('course_id')
                ->on('course')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practise_video');
    }
};
