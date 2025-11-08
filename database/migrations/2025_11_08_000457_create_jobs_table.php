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
        Schema::create('jobs', function (Blueprint $table) {
               $table->id();
            $table->string('company_name')->nullable();
            $table->string('position')->nullable();
            $table->string('job_category')->nullable();
            $table->string('job_type')->nullable();
            $table->integer('no_of_vacancy')->nullable();
            $table->string('experience')->nullable();
            $table->date('posted_date')->nullable();
            $table->date('last_date')->nullable();
            $table->date('close_date')->nullable();
            $table->string('gender')->nullable();
            $table->decimal('salary_from', 10, 2)->nullable();
            $table->decimal('salary_to', 10, 2)->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('education_level')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
