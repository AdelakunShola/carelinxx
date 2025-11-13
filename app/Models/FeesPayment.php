<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeesPayment extends Model
{
    protected $guarded = [];


    public function userPayments()
    {
        return $this->hasMany(UserPayment::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeByMethod($query, $method)
    {
        return $query->where('payment_method', $method);
    }
}
