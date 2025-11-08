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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();

            // ============================================================
            // BASIC IDENTITY
            // ============================================================
            $table->string('title')->nullable(); // Mr, Mrs, Ms, Dr, etc.
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('preferred_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->enum('role',['admin','user'])->default('user');
            
            // ============================================================
            // CONTACT INFORMATION
            // ============================================================
            $table->string('phone_primary')->nullable();
            $table->string('phone_secondary')->nullable();
            
            // ============================================================
            // ADDRESS
            // ============================================================
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('state_province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();
            
            // ============================================================
            // EMERGENCY CONTACT
            // ============================================================
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relationship')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('emergency_contact_email')->nullable();
            
            // ============================================================
            // PROFILE
            // ============================================================
            $table->string('profile_photo_url')->nullable();
            $table->string('preferred_language')->nullable();
            $table->json('additional_languages')->nullable(); // Array of languages spoken
            
            // ============================================================
            // SYSTEM FIELDS
            // ============================================================
            $table->enum('application_status', ['pending', 'approved', 'rejected', 'under_review'])->default('pending')->nullable();
            $table->enum('account_status', ['active', 'inactive'])->default('active')->nullable();
            $table->timestamp('last_login')->nullable();

            // ============================================================
            // LEGAL & IDENTIFICATION
            // ============================================================
            // Government ID
            $table->string('id_type')->nullable(); // Passport, National ID, Driver's License, etc.
            $table->string('id_number')->nullable();
            $table->string('id_issuing_country')->nullable();
            $table->date('id_issue_date')->nullable();
            $table->date('id_expiry_date')->nullable();
            $table->string('id_document_url')->nullable();
            
            // Work Authorization
            $table->string('work_authorization_status')->nullable(); // Citizen, Permanent Resident, Work Visa, etc.
            $table->string('work_permit_number')->nullable();
            $table->date('work_permit_expiry')->nullable();
            $table->string('work_permit_document_url')->nullable();
            
            // Tax Information
            $table->string('tax_id_number')->nullable(); // SSN, NIN, etc. (encrypted in production)
            
            // Right to Work Verification
            $table->boolean('right_to_work_verified')->default(false)->nullable();
            $table->string('verified_by')->nullable();
            $table->date('verified_date')->nullable();

            // ============================================================
            // QUALIFICATIONS (using JSON for multiple entries)
            // ============================================================
            $table->json('qualifications')->nullable(); 
            // Structure: [{
            //   qualification_type, qualification_name, institution_name, 
            //   field_of_study, country, start_date, completion_date, 
            //   is_ongoing, grade_gpa, document_url
            // }]

            // ============================================================
            // CERTIFICATIONS (using JSON for multiple entries)
            // ============================================================
            $table->json('certifications')->nullable();
            // Structure: [{
            //   certification_name, issuing_organization, certification_number,
            //   issue_date, expiry_date, is_healthcare_specific, 
            //   certification_level, document_url, verification_status
            // }]
            // Common: First Aid, CPR, CNA, HCA, Medication Administration,
            // Dementia Care, Manual Handling, Safeguarding, Food Hygiene

            // ============================================================
            // PROFESSIONAL EXPERIENCE (using JSON for multiple entries)
            // ============================================================
            $table->json('work_experiences')->nullable();
            // Structure: [{
            //   employer_name, job_title, employment_type, start_date,
            //   end_date, is_current, location_city, location_country,
            //   care_type, care_setting, responsibilities, key_achievements,
            //   reference_name, reference_position, reference_phone,
            //   reference_email, reference_provided
            // }]

            // ============================================================
            // BACKGROUND CHECKS & CLEARANCES
            // ============================================================
            // Criminal Background Check
            $table->string('dbs_check_type')->nullable(); // Basic, Standard, Enhanced (UK DBS)
            $table->string('dbs_certificate_number')->nullable();
            $table->date('dbs_issue_date')->nullable();
            $table->string('dbs_document_url')->nullable();
            
            // International Background Check
            $table->string('background_check_type')->nullable();
            $table->string('background_check_country')->nullable();
            $table->date('background_check_date')->nullable();
            $table->enum('background_check_status', ['clear', 'pending', 'issues_found'])->nullable();
            $table->string('background_check_document_url')->nullable();
            
            // Health Clearances
            $table->date('health_screening_date')->nullable();
            $table->enum('health_screening_status', ['clear', 'pending', 'follow_up_required'])->nullable();
            $table->date('tuberculosis_test_date')->nullable();
            $table->string('tuberculosis_test_result')->nullable();
            
            // Immunization Records
            $table->string('immunization_records_url')->nullable();
            $table->boolean('immunizations_up_to_date')->nullable();
            
            // Professional Registration
            $table->string('professional_registration_number')->nullable();
            $table->string('registration_body')->nullable(); // NMC, HCPC, Care Quality Commission
            $table->date('registration_expiry')->nullable();

            // ============================================================
            // REFERENCES (using JSON for multiple entries)
            // ============================================================
            $table->json('references')->nullable();
            // Structure: [{
            //   reference_type, referee_name, referee_organization,
            //   referee_position, relationship_to_applicant, years_known,
            //   referee_phone, referee_email, reference_status,
            //   reference_document_url, reference_date
            // }]

            // ============================================================
            // SKILLS & COMPETENCIES (using JSON for multiple entries)
            // ============================================================
            $table->json('care_skills')->nullable();
            // Structure: [{
            //   skill_category, skill_name, proficiency_level,
            //   years_of_experience, last_used, certification_required
            // }]
            // Common: Bathing/Hygiene, Mobility Support, Medication Management,
            // Wound Care, Catheter Care, Dementia Care, Behavioral Management

            // ============================================================
            // PREFERENCES & AVAILABILITY
            // ============================================================
            // Job Preferences
            $table->json('preferred_care_types')->nullable(); // Elderly, Disability, Pediatric
            $table->json('preferred_work_settings')->nullable(); // Home Care, Residential, Hospital
            $table->json('preferred_employment_types')->nullable(); // Full-time, Part-time, Live-in
            
            $table->boolean('willing_to_relocate')->default(false)->nullable();
            $table->integer('max_commute_distance')->nullable(); // in km or miles
            $table->json('preferred_locations')->nullable();
            
            // Shift Preferences
            $table->json('available_days')->nullable(); // Monday-Sunday
            $table->json('available_shifts')->nullable(); // Morning, Afternoon, Evening, Night, Weekend
            $table->boolean('available_for_overnight')->default(false)->nullable();
            $table->boolean('available_for_live_in')->default(false)->nullable();
            
            // Start Date
            $table->date('earliest_start_date')->nullable();
            $table->integer('notice_period_days')->nullable();
            
            // Compensation
            $table->string('expected_salary_currency')->nullable();
            $table->decimal('expected_salary_min', 10, 2)->nullable();
            $table->decimal('expected_salary_max', 10, 2)->nullable();
            $table->string('salary_period')->nullable(); // hourly, weekly, monthly, annually

            // ============================================================
            // DOCUMENTS & ATTACHMENTS (using JSON for multiple entries)
            // ============================================================
            $table->json('documents')->nullable();
            // Structure: [{
            //   document_type, document_name, document_url, file_size,
            //   file_type, upload_date, expiry_date, verification_status
            // }]

            // ============================================================
            // GDPR & CONSENT (using JSON for multiple consents)
            // ============================================================
            $table->json('user_consents')->nullable();
            // Structure: [{
            //   consent_type, consent_given, consent_date, consent_ip_address,
            //   consent_text, consent_version, withdrawn_date, withdrawal_reason
            // }]

            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
