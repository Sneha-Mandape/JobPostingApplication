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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id');
            $table->foreign('candidate_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('job_listings')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->text('why_hire');
            $table->string('resume');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
