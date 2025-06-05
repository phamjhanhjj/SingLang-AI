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
        Schema::create('student_progress', function (Blueprint $table) {
            // $table->id();
            $table->string('student_id');
            $table->float('total_score')->default(0);
            $table->float('word_score')->default(0);
            $table->float('video_score')->default(0);
            $table->integer('level')->default(1);
            // $table->timestamps();

            $table->foreign('student_id')
                ->references('student_id')
                ->on('student')
                ->onDelete('cascade');
            $table->primary('student_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_progress');
    }
};
