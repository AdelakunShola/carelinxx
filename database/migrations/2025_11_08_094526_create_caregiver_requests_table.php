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
        Schema::create('caregiver_requests', function (Blueprint $table) {
          $table->id();
            $table->string('tracking_number')->unique();
            $table->string('who_needs_care');
            $table->string('relationship_detail')->nullable();
            $table->string('location_postcode');
            $table->string('location_city')->nullable();
            $table->string('location_address')->nullable();
            $table->decimal('location_latitude', 10, 8)->nullable();
            $table->decimal('location_longitude', 11, 8)->nullable();
            $table->enum('urgency', ['immediately', 'within_2_weeks', 'within_1_month']);
            $table->enum('hours_per_week', ['1-10', '10-20', '20+']);
            $table->enum('duration', ['1-4_weeks', '1-6_months', '6+_months']);
            $table->json('service_types')->nullable(); // ['companion', 'personal_care']
            $table->json('health_conditions')->nullable(); // ['home_health_care', 'post_surgery', 'als', 'alzheimers']
            $table->enum('gender_preference', ['any', 'female', 'male'])->default('any');
            $table->string('language_preference')->default('english');
            $table->json('additional_languages')->nullable();
            $table->enum('schedule_type', ['flexible', 'fixed']);
            $table->string('email');
            $table->text('admin_notes')->nullable();
            $table->integer('current_step')->default(1);
            $table->string('phone')->nullable();
            $table->enum('status', ['incomplete', 'pending', 'matched', 'cancelled'])->default('incomplete');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            
            $table->index('tracking_number');
            $table->index('email');
            $table->index('status');
            $table->index('location_postcode');

   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caregiver_requests');
    }
};
