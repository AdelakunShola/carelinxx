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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            
            // Application Details
            $table->text('cover_letter')->nullable();
            $table->string('cv_document_url')->nullable();
            $table->enum('application_status', [
                'pending', 
                'under_review', 
                'shortlisted', 
                'interview_scheduled',
                'rejected', 
                'accepted',
                'withdrawn'
            ])->default('pending');
            
            // Interview Details
            $table->dateTime('interview_date')->nullable();
            $table->string('interview_location')->nullable();
            $table->text('interview_notes')->nullable();
            
            // Admin Notes
            $table->text('admin_notes')->nullable();
            $table->string('reviewed_by')->nullable();
            $table->dateTime('reviewed_at')->nullable();
            
            // Tracking
            $table->dateTime('applied_at')->nullable();
            $table->dateTime('withdrawn_at')->nullable();
            $table->text('withdrawal_reason')->nullable();
            
            $table->timestamps();
            
            // Prevent duplicate applications
            $table->unique(['user_id', 'job_id']);
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
