<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [

        'customer_name',
        'customer_address',
        'Customer_nic',
        'order_id',
        'product_id',
        'product_name',
        'customer_phone',
        'customer_email',
        'cod',
        'weight',
        'pickup_address',
        'origin_city_name',
        'destination_city_name',
        'origin_country',
    ];
}
