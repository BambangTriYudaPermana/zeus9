<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MAddress extends Model
{
    use HasFactory;

    protected $table = 'm_address';
    protected $primaryKey = 'id';
    public $timestamps = false; 

    protected $fillable = [
        'address',
        'private_key',
        'public_key',
        'address_hex',
        'balance_address',
        'status',
        'created_at'

    ];
}
