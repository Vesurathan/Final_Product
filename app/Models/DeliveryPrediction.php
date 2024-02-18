<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPrediction extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name', 'customer_address', 'customer_phone', 'customer_email',
        'cod', 'weight', 'pickup_address', 'origin_city_name',
        'destination_city_name', 'origin_country',
    ];
}
