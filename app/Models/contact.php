<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{

    protected $guarded = [];
    protected $casts = [
        'replied_at' => 'datetime',
    ];

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    public function scopeReplied($query)
    {
        return $query->where('status', 'replied');
    }
}
