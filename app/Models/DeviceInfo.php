<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceInfo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'device', 'platform', 'browser'];

    // Assuming you have a relationship defined for the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
