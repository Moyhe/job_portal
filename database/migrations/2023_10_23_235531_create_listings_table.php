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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->text('description');
            $table->string('slug');
            $table->string('feature_image');
            $table->text('roles');
            $table->string('experience');
            $table->text('education_experience');
            $table->text('other_benifits');
            $table->string('gender');
            $table->string('vacancy');
            $table->string('job_type');
            $table->string('job_region');
            $table->string('salary');
            $table->date('application_close_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
