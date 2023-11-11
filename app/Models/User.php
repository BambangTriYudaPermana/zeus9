<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
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
        'otp',
        'wallet',
        'ttl_win',
        'id_role',
        'id_address',
        'referral_code',
        'my_referral_code',
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
    ];

    public function role(): HasOne
    {
        return $this->hasOne(MRole::class, 'id', 'id_role');
    }

    public function address(): HasOne
    {
        return $this->hasOne(MAddress::class, 'id', 'id_address');
    }

    public function bonus_slot(): HasOne
    {
        return $this->hasOne(Bonus::class, 'id_user', 'id')->where(['game' => 'slot', 'status' => 1]);
    }
}
