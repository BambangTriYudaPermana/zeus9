<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;

class HisTopup extends Model
{
    use HasFactory;

    protected $table = 'his_topup';
    protected $primaryKey = 'id';
    public $timestamps = false; 

    protected $fillable = [
        'id_user',
        'saldo',
        'status',
        'created_at'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
