<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;

class ActivityTransaction extends Model
{
    use HasFactory;

    protected $table = 'activity_transaction';
    protected $primaryKey = 'id';
    public $timestamps = false; 

    protected $fillable = [
        'id_user',
        'type',
        'amount',
        'address_destination',
        'status',
        'created_at'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
