<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    
    protected $guarded = [];
    
    protected $casts = [
        'interview_date' => 'datetime',
        'reviewed_at' => 'datetime',
        'applied_at' => 'datetime',
        'withdrawn_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
