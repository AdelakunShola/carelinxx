<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaregiverRequest extends Model
{

     protected $guarded = [];
     protected $casts = [
        'service_types' => 'array',
        'health_conditions' => 'array',
        'additional_languages' => 'array',
        'completed_at' => 'datetime',
    ];

    // Generate unique tracking number
      // Generate unique tracking number
   // Generate unique tracking number
    public static function generateTrackingNumber()
    {
        do {
            $number = 'CR-' . strtoupper(substr(uniqid(), -8));
        } while (self::where('tracking_number', $number)->exists());
        
        return $number;
    }

    // Get progress percentage based on current step
    public function getProgressPercentage()
    {
        $step = $this->current_step ?? 1;
        return ($step / 6) * 100;
    }

    // Get care recipient name from who_needs_care
    public function getCareRecipientAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->who_needs_care));
    }

    // Scopes
    public function scopeIncomplete($query)
    {
        return $query->where('status', 'incomplete');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeMatched($query)
    {
        return $query->where('status', 'matched');
    }

}
