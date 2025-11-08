<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
     protected $guarded = [];

      protected $casts = [
        'posted_date' => 'date',
        'last_date' => 'date',
        'close_date' => 'date',
        'salary_from' => 'decimal:2',
        'salary_to' => 'decimal:2',
    ];

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
