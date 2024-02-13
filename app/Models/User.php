<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function deviceInfo()
    {
        return $this->hasMany(DeviceInfo::class);
    }

    public function ipInfos()
    {
        return $this->hasMany(IpInfo::class);
    }

    public function scrollSpeeds()
    {
        return $this->hasMany(ScrollSpeed::class);
    }

    public function buttonClicks()
    {
        return $this->hasMany(ButtonClick::class);
    }

    public function keyEvents()
    {
        return $this->hasMany(KeyEvent::class);
    }

    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }
}
