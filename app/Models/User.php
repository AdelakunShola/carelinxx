<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
  


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'date_of_birth' => 'date',
        'last_login' => 'datetime',
        'additional_languages' => 'array',
        'qualifications' => 'array',
        'certifications' => 'array',
        'work_experiences' => 'array',
        'references' => 'array',
        'care_skills' => 'array',
        'preferred_care_types' => 'array',
        'preferred_work_settings' => 'array',
        'preferred_employment_types' => 'array',
        'preferred_locations' => 'array',
        'available_days' => 'array',
        'available_shifts' => 'array',
        'documents' => 'array',
        'user_consents' => 'array',
    ];

    // Get full name
    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->last_name}");
    }

    // Get initials for avatar
    public function getInitialsAttribute()
    {
        $firstInitial = $this->first_name ? substr($this->first_name, 0, 1) : '';
        $lastInitial = $this->last_name ? substr($this->last_name, 0, 1) : '';
        return strtoupper($firstInitial . $lastInitial) ?: 'U';
    }

    // Calculate profile completion percentage
    public function getProfileCompletionAttribute()
    {
        $fields = [
            'first_name', 'last_name', 'date_of_birth', 'gender', 
            'phone_primary', 'address_line1', 'city', 'country',
            'emergency_contact_name', 'emergency_contact_phone',
            'id_type', 'id_number', 'work_authorization_status',
        ];

        $filledFields = 0;
        foreach ($fields as $field) {
            if (!empty($this->$field)) {
                $filledFields++;
            }
        }

        return round(($filledFields / count($fields)) * 100);
    }
}
