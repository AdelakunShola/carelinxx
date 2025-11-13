<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{

     protected $guarded = [];
    public static function getSettings()
    {
        return self::first() ?? self::create([
            'company_name' => 'NuviaCare',
            'company_email' => 'info@nuviacare.com',
            'company_phone' => '+234 123 456 7890',
            'company_address' => '123 Healthcare Avenue, Lagos, Nigeria',
        ]);
    }
}
