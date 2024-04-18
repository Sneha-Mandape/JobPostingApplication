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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_category_id');
            $table->unsignedBigInteger('job_type_id');
            $table->string('title');
            $table->text('company_details');
            $table->text('tags')->nullable();
            $table->text('skills')->nullable();
            $table->string('experience_required')->nullable();
            $table->text('description');
            $table->string('salary')->nullable();
            $table->json('custom_fields')->nullable(); // Store custom fields as JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
