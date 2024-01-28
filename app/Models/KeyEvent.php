<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'data',
        'user_id',
    ];
}
