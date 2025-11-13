<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{

     protected $guarded = [];
    protected $casts = [
        'amount' => 'decimal:2',
        'confirmed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feesPayment()
    {
        return $this->belongsTo(FeesPayment::class);
    }
}
